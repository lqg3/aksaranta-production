<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonPart extends Model
{

    protected $fillable = [
        'lesson_id',
        'part_name',
        'part_description',
        'part_video_url',
        'part_content',
        'order',
    ];
    protected $casts = [
        'quiz_content' => 'array', // Agar JSON otomatis jadi array
    ];
    /** @use HasFactory<\Database\Factories\LessonPartFactory> */
    use HasFactory;
}
