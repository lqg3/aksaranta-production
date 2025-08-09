<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LessonPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'part_name',
        'part_description',
        'part_video_url',
        'part_content',
        'order',
        'slug', // tambahkan agar slug bisa diisi otomatis
        'quiz_content',
    ];

    protected $casts = [
        'quiz_content' => 'array', // JSON otomatis jadi array
    ];

    public static function generateUniqueSlug($partName)
    {
        $slug = Str::slug($partName);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected static function booted()
    {
        static::creating(function ($lessonPart) {
            if (empty($lessonPart->slug)) {
                $lessonPart->slug = static::generateUniqueSlug($lessonPart->part_name);
            }
        });

        static::updating(function ($lessonPart) {
            if ($lessonPart->isDirty('part_name')) {
                $lessonPart->slug = static::generateUniqueSlug($lessonPart->part_name);
            }
        });
    }
}
