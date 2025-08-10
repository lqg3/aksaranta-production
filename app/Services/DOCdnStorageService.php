<?php

namespace App\Services;

use Aws\S3\S3Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class DOCdnStorageService
{
    private S3Client $client;
    private string $bucket;
    private string $cdnBaseUrl;

    public function __construct()
    {
        $region = env('DO_SPACES_REGION', 'sgp1');

        // Bucket first so we can sanitize endpoint if it mistakenly includes the bucket
        $this->bucket = env('DO_SPACES_BUCKET', 'aksara-batak');

        $endpoint = env('DO_SPACES_ENDPOINT', "https://{$region}.digitaloceanspaces.com");
        // Normalize endpoint: ensure it does NOT contain the bucket subdomain
        // Valid endpoint example: https://sgp1.digitaloceanspaces.com
        // Invalid (will cause duplicated bucket in host): https://<bucket>.sgp1.digitaloceanspaces.com
        $parsed = parse_url($endpoint);
        if (!empty($parsed['host'])) {
            $host = $parsed['host'];
            $bucketPrefix = $this->bucket . '.';
            if (str_starts_with($host, $bucketPrefix)) {
                $host = substr($host, strlen($bucketPrefix));
                $endpoint = ($parsed['scheme'] ?? 'https') . '://' . $host;
            }
        }

        // Resolve credentials from multiple possible env names
        $accessKey = env('DO_CDN_ACCESS_KEY')
            ?: env('DO_SPACES_KEY')
            ?: env('AWS_ACCESS_KEY_ID');
        $secretKey = env('DO_CDN_SECRET')
            ?: env('DO_SPACES_SECRET')
            ?: env('AWS_SECRET_ACCESS_KEY')
            ?: env('DO_CDN_KEY'); // user indicated this contains the Spaces Secret Key

        // Trim to avoid signature issues due to stray spaces/newlines in .env
        $accessKey = is_string($accessKey) ? trim($accessKey) : $accessKey;
        $secretKey = is_string($secretKey) ? trim($secretKey) : $secretKey;

        if (empty($accessKey) || empty($secretKey)) {
            throw new \RuntimeException('DigitalOcean Spaces credentials are not configured. Please set DO_CDN_ACCESS_KEY (Access Key) and DO_CDN_KEY or DO_CDN_SECRET (Secret Key).');
        }

        $verify = env('CA_BUNDLE_PATH')
            ?: env('CURL_CA_BUNDLE')
            ?: env('SSL_CERT_FILE')
            ?: true; // default to system CA store

        $this->client = new S3Client([
            'version' => 'latest',
            'region' => $region,
            'endpoint' => $endpoint,
            'use_path_style_endpoint' => false,
            'credentials' => [
                'key'    => $accessKey,
                'secret' => $secretKey,
            ],
            'http' => [
                'verify' => $verify,
            ],
        ]);

        // Public CDN base, e.g. https://your-space.sgp1.cdn.digitaloceanspaces.com
        $this->cdnBaseUrl = rtrim(env('DO_CDN_BASE_URL', env('DO_SPACES_CDN_BASE_URL', '')), '/');
    }

    /**
     * Upload a file to DigitalOcean Spaces and return the public CDN URL
     */
    public function upload(UploadedFile $file, string $folder = 'uploads'): string
    {
        $extension = $file->getClientOriginalExtension() ?: 'bin';
        $key = trim($folder, '/') . '/' . Str::uuid() . '.' . $extension;

        $this->client->putObject([
            'Bucket'      => $this->bucket,
            'Key'         => $key,
            'Body'        => file_get_contents($file->getRealPath()),
            'ACL'         => 'public-read',
            'ContentType' => $file->getMimeType() ?: 'application/octet-stream',
        ]);

        if ($this->cdnBaseUrl !== '') {
            return $this->cdnBaseUrl . '/' . $key;
        }

        // Fallback to origin URL if CDN base is not configured
        $region = env('DO_SPACES_REGION', 'sgp1');
        $spaceName = env('DO_SPACES_BUCKET', $this->bucket);
        return "https://{$spaceName}.{$region}.digitaloceanspaces.com/{$key}";
    }

    /**
     * Delete a file from the Space based on its public URL
     */
    public function delete(string $publicUrl): bool
    {
        $key = $this->extractKeyFromPublicUrl($publicUrl);
        if ($key === null) {
            return false;
        }

        $this->client->deleteObject([
            'Bucket' => $this->bucket,
            'Key'    => $key,
        ]);

        return true;
    }

    private function extractKeyFromPublicUrl(string $url): ?string
    {
        $candidates = array_filter([
            $this->cdnBaseUrl,
            // origin style: https://<space>.<region>.digitaloceanspaces.com
            sprintf('https://%s.%s.digitaloceanspaces.com', env('DO_SPACES_BUCKET', $this->bucket), env('DO_SPACES_REGION', 'sgp1')),
        ]);

        foreach ($candidates as $base) {
            $base = rtrim($base, '/');
            if ($base !== '' && str_starts_with($url, $base . '/')) {
                return ltrim(substr($url, strlen($base . '/')), '/');
            }
        }

        // Try generic match for digitaloceanspaces URLs
        $parsed = parse_url($url);
        if (!empty($parsed['path'])) {
            return ltrim($parsed['path'], '/');
        }

        return null;
    }
}


