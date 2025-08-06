<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    protected $fillable = [
        'lesson_part_id',
        'quiz_type',
        'quiz_content',
    ];
    
    /** @use HasFactory<\Database\Factories\QuizFactory> */
    use HasFactory;
}
