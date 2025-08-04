<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonPart extends Model
{

    protected $fillable = [
        'lesson_id',
        'part_name',
        'part_type',
        'part_description',
        'part_video_url',
        'part_content',
        'lesson_part',
        'part_video_url',
    ];
    /** @use HasFactory<\Database\Factories\LessonPartFactory> */
    use HasFactory;
}
