<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'lesson_name',
        'order',
        'slug', // tambahkan slug supaya bisa diisi otomatis
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessonParts()
    {
        return $this->hasMany(LessonPart::class);
    }

    public static function generateUniqueSlug($lessonName)
    {
        $slug = Str::slug($lessonName);
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
        static::creating(function ($lesson) {
            if (empty($lesson->slug)) {
                $lesson->slug = static::generateUniqueSlug($lesson->lesson_name);
            }
        });

        static::updating(function ($lesson) {
            if ($lesson->isDirty('lesson_name')) {
                $lesson->slug = static::generateUniqueSlug($lesson->lesson_name);
            }
        });
    }
}
