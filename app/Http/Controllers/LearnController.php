<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonPart;

class LearnController extends Controller
{
    public function getLessonParts($course){
        $lessons = Lesson::where('course_id', $course->id)->get();
        $lesson_parts = [];
        foreach ($lessons as $lesson) {
            $parts = LessonPart::where('lesson_id', $lesson->id)->get();
            foreach ($parts as $part) {
                $lesson_parts[] = $part;
            }
        }

        return $lesson_parts;
        
    }
    public function index(){
        $courseData = Course::orderBy('created_at', 'desc')->get();
        return view('learn.index', compact('courseData'));

    }
    public function show($slug){
        // Route - /learn/{slug}
        $course = Course::where('slug', $slug)->firstOrFail();

        // Get Lessons & their parts
        $lessons = Lesson::where('course_id', $course->id)->get();

        // Build an array of all lesson parts for all lessons
        $lesson_parts = [];
        foreach ($lessons as $lesson) {
            $parts = LessonPart::where('lesson_id', $lesson->id)->get();
            foreach ($parts as $part) {
                $lesson_parts[] = $part;
            }
        }

        return view('learn.course', [
            'course' => $course,
            'lessons' => ['lesson' => $lessons],
            'lesson_parts' => $lesson_parts,
            'slug' => $slug,
            // TODO: user lesson progress
            
        ]);
    }

    public function lessonShow($slug, $lesson_slug)
    {
        // Ambil course berdasarkan slug
        $course = Course::where('slug', $slug)->firstOrFail();

        // Ambil lesson berdasarkan course dan slug lesson
        $lesson = Lesson::where('course_id', $course->id)
            ->where('lesson_name', $lesson_slug)
            ->firstOrFail();

        // Ambil semua LessonPart dari lesson ini
        $lessonParts = LessonPart::where('lesson_id', $lesson->id)
            ->orderBy('order') // optional: jika kamu pakai kolom 'order'
            ->get();

        // Video pertama (jika ada)
        $firstVideoUrl = $lessonParts->first()?->part_video_url;

        return view('learn.lesson', [
            'course' => $course,
            'lessonSlug' => $lesson_slug,
            'lessonName' => $lesson->lesson_name,
            'lessonParts' => $lessonParts,
            'partVideoUrl' => $firstVideoUrl,
        ]);
    }

    
    public function create(){
        // TODO: Admin panel later
    }
    public function store(){
        // TODO: user progress
    }

    
}

