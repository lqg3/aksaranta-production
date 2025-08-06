<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLessonPartProgress extends Model
{
    protected $fillable = [
        'lesson_part_id',
        'user_id',
        'completed_at'
    ];
    /** @use HasFactory<\Database\Factories\UserLessonPartProgressFactory> */
    use HasFactory;
}
