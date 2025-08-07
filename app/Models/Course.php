<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_description',
        'slug',
        'instructor',
        'image_url',
    ];

    /**
     * Generate unique slug from course_name
     */
    public static function generateUniqueSlug($courseName)
    {
        $slug = Str::slug($courseName);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Automatically set slug before creating
     */
    protected static function booted()
    {
        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = static::generateUniqueSlug($course->course_name);
            }
        });
    }
}
