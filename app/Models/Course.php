<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name',
        'course_description',
        'slug',
        'instructor',
        'image_url',
    ];

    

    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
}
