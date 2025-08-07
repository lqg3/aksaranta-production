<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable =  [
        'lesson_part_id',
        'video_url',
        'video_description',
    ];

    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;
}
