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
        // Route - /learn/{{slug}}/{{lesson_slug}}
        $course = Course::where('slug', $slug)->firstOrFail();

        // Find the lesson by name and course
        $lesson = Lesson::where('course_id', $course->id)
            ->where('lesson_name', $lesson_slug)
            ->firstOrFail();

        // Get all parts for this lesson
        $lessonParts = LessonPart::where('lesson_id', $lesson->id)->get();

        // The original code is not "appending" because it overwrites $partVideoUrl each time a 'video' part is found.
        // To "append" all video URLs, use an array and push each one in.
        $partVideoUrls = [];
        foreach ($lessonParts as $part) {
            if (strtolower((string) $part->part_type) === 'video') {
                $partVideoUrls[] = $part->part_video_url;
            }
        }

        return view('learn.lesson', [
            'course' => $course,
            'lessonSlug' => $lesson_slug,
            'lessonName' => $lesson->lesson_name,
            'lessonParts' => $lessonParts,
            'partVideoUrl' => $lessonParts[0]->part_video_url,
        ]);
    }
    
    public function create(){
        // TODO: Admin panel later
    }
    public function store(){
        // TODO: user progress
    }

    
}

