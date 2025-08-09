<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonPart;
use App\Models\UserLessonPartProgress;
use App\Models\UserLessonProgress;

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
    
    public function show($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $lessons = Lesson::where('course_id', $course->id)->get();

        $lesson_parts = [];
        foreach ($lessons as $lesson) {
            $parts = LessonPart::where('lesson_id', $lesson->id)->get();
            foreach ($parts as $part) {
                $lesson_parts[] = $part;
            }
        }

        $completedParts = [];
        $completedLessons = [];
        if (auth()->check()) {
            $userId = auth()->id();

            // Completed lesson parts for user within this course
            $lessonIds = $lessons->pluck('id')->toArray();

            $completedParts = \App\Models\UserLessonPartProgress::where('user_id', $userId)
                ->whereIn('lesson_part_id', function ($query) use ($lessonIds) {
                    $query->select('id')
                        ->from('lesson_parts')
                        ->whereIn('lesson_id', $lessonIds);
                })
                ->pluck('lesson_part_id')
                ->toArray();

            // Completed lessons for user in this course
            $completedLessons = \App\Models\UserLessonProgress::where('user_id', $userId)
                ->whereIn('lesson_id', $lessonIds)
                ->pluck('lesson_id')
                ->toArray();
        }

        return view('learn.course', [
            'course' => $course,
            'lessons' => ['lesson' => $lessons],
            'lesson_parts' => $lesson_parts,
            'slug' => $slug,
            'completedParts' => $completedParts,
            'completedLessons' => $completedLessons,
        ]);
    }



    // public function lessonShow($slug, $lesson_slug)
    // {
    //     // Ambil course berdasarkan slug
    //     $course = Course::where('slug', $slug)->firstOrFail();

    //     // Ambil lesson berdasarkan course dan slug lesson
    //     $lesson = Lesson::where('course_id', $course->id)
    //         ->where('slug', $lesson_slug)
    //         ->firstOrFail();

    //     // Ambil semua LessonPart dari lesson ini
    //     $lessonParts = LessonPart::where('lesson_id', $lesson->id)
    //         ->orderBy('order')
    //         ->get();

    //     // Video pertama (jika ada)
    //     $firstVideoUrl = $lessonParts->first()?->part_video_url;

    //     return view('learn.lesson', [
    //         'course' => $course,
    //         'lessonSlug' => $lesson->slug,
    //         'lessonName' => $lesson->lesson_name,
    //         'lessonParts' => $lessonParts,
    //         'partVideoUrl' => $firstVideoUrl,
    //     ]);
    // }
    
        public function lessonPartShow($slug, $lesson_slug, $lesson_part_slug)
        {
            $course = Course::where('slug', $slug)->firstOrFail();

            $lesson = Lesson::where('course_id', $course->id)
                ->where('slug', $lesson_slug)
                ->firstOrFail();

            $lessonPart = LessonPart::where('lesson_id', $lesson->id)
                ->where('slug', $lesson_part_slug)
                ->firstOrFail();

            // Decode quiz content JSON
            $quizzesRaw = is_string($lessonPart->quiz_content) 
                ? json_decode($lessonPart->quiz_content, true) 
                : $lessonPart->quiz_content ?? [];


            $quizzes = array_map(function ($quiz) {
                $type = $quiz['quiz_type'];
                $content = $quiz['quiz_content'];

                if ($type === 'multiple_choice') {
                    // Remove correct_option key to hide answer
                    unset($content['correct_option']);
                    return [
                        'quiz_type' => $type,
                        'quiz_content' => $content
                    ];
                }

                if ($type === 'drag_and_drop') {
                    // Extract pairs
                    $pairs = $content['pairs'] ?? [];

                    // Extract items and targets separately
                    $items = array_map(fn($p) => $p['item'], $pairs);
                    $targets = array_map(fn($p) => $p['target'], $pairs);

                    // Shuffle items and targets independently so indexes don't match
                    shuffle($items);
                    shuffle($targets);

                    return [
                        'quiz_type' => $type,
                        'quiz_content' => [
                            'question' => $content['question'] ?? '',
                            'items' => $items,
                            'targets' => $targets,
                        ]
                    ];
                }

                if ($type === 'fill_in_the_blank') {
                    // Remove answer key to hide correct answer
                    unset($content['answer']);
                    return [
                        'quiz_type' => $type,
                        'quiz_content' => $content
                    ];
                }

                // fallback - return as is
                return $quiz;
            }, $quizzesRaw);


            // Encode transformed quizzes back to JSON string
            $lessonPart->quiz_content = json_encode($quizzes);

            return view('learn.lesson', [
                'course' => $course,
                'lesson' => $lesson,
                'lessonPart' => $lessonPart,
                'completed' => auth()->check()
                    ? auth()->user()->lessonPartProgress()->where('lesson_part_id', $lessonPart->id)->exists()
                    : false,
                'isLogged' => auth()->check(),
            ]);

        }

    public function submitQuiz(Request $request, $course_id, $lesson_id, $lesson_part_id)
    {
        try {
            $lessonPart = LessonPart::findOrFail($lesson_part_id);

            if (empty($lessonPart->quiz_content)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Quiz content empty',
                ], 400);
            }

            $quizContent = $lessonPart->quiz_content;

            if (is_string($quizContent)) {
                $quizzes = json_decode($quizContent, true);
            } elseif (is_array($quizContent)) {
                $quizzes = $quizContent; // already decoded
            } else {
                $quizzes = null; // invalid type
            }

            if (!is_array($quizzes)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid quiz content format.',
                ], 400);
            }

            $request->validate([
                'answers' => 'required|array',
            ]);

            $submittedAnswers = $request->input('answers');

            $total = count($quizzes);
            $correctCount = 0;
            $feedback = [];

            foreach ($quizzes as $index => $quiz) {
                $quizType = $quiz['quiz_type'] ?? '';
                $content = $quiz['quiz_content'] ?? [];
                $submittedAnswer = null;

                foreach ($submittedAnswers as $ans) {
                    if (isset($ans['quizIndex']) && $ans['quizIndex'] == $index) {
                        $submittedAnswer = $ans['answer'];
                        break;
                    }
                }

                $isCorrect = false;

                if ($quizType === 'multiple_choice') {
                    $correctOption = $content['correct_option'] ?? null;
                    $isCorrect = ($submittedAnswer !== null && (string)$submittedAnswer === (string)$correctOption);
                    $correctAnswer = $content['options'][$correctOption]['option_text'] ?? null; // get correct option text
                } elseif ($quizType === 'drag_and_drop') {
                    $pairs = $content['pairs'] ?? [];
                    $isCorrect = true;
                    $pairFeedback = [];
                    foreach ($pairs as $pair) {
                        $target = $pair['target'] ?? null;
                        $correctItem = $pair['item'] ?? null;
                        $userItem = $submittedAnswer[$target] ?? null;

                        $correctForTarget = ($userItem === $correctItem);
                        $pairFeedback[$target] = $correctForTarget;

                        if (!$correctForTarget) {
                            $isCorrect = false;
                        }
                    }
                } elseif ($quizType === 'fill_in_the_blank') {
                    $correctAnswer = $content['answer'] ?? null;
                    if ($submittedAnswer !== null && is_string($submittedAnswer) && $correctAnswer !== null) {
                        $isCorrect = (trim(strtolower($submittedAnswer)) === trim(strtolower($correctAnswer)));
                    }
                } else {
                    $correctAnswer = null;
                }

                if ($isCorrect) {
                    $correctCount++;
                }

                $feedbackItem = [
                    'quizIndex' => $index,
                    'correct' => $isCorrect,
                    'submittedAnswer' => $submittedAnswer,
                ];

                if ($quizType === 'drag_and_drop') {
                    $feedbackItem['pairFeedback'] = $pairFeedback ?? [];
                    $feedbackItem['correctAnswer'] = $pairs; // send full correct pairs for display
                } else {
                    $feedbackItem['correctAnswer'] = $correctAnswer ?? null;
                }

                $feedback[] = $feedbackItem;
            }

            $score = $total > 0 ? round(($correctCount / $total) * 100) : 0;

            return response()->json([
                'status' => 'success',
                'score' => $score,
                'total' => $total,
                'correct' => $correctCount,
                'feedback' => $feedback,
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server error: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function toggleComplete(Request $request, $course_id, $lesson_id, $lesson_part_id)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        // Toggle lesson part progress
        $progress = UserLessonPartProgress::where('user_id', $user->id)
            ->where('lesson_part_id', $lesson_part_id)
            ->first();

        if ($progress) {
            // Toggle off: delete progress
            $progress->delete();
            $status = 'incomplete';
        } else {
            // Toggle on: create progress
            $progress = UserLessonPartProgress::create([
                'user_id' => $user->id,
                'lesson_part_id' => $lesson_part_id,
                'completed_at' => now(),
            ]);
            $status = 'complete';
        }

        // Check if all lesson parts completed for this lesson
        $lessonPartsCount = LessonPart::where('lesson_id', $lesson_id)->count();

        $completedPartsCount = UserLessonPartProgress::where('user_id', $user->id)
            ->whereIn('lesson_part_id', function ($query) use ($lesson_id) {
                $query->select('id')->from('lesson_parts')->where('lesson_id', $lesson_id);
            })
            ->count();

        if ($lessonPartsCount > 0 && $completedPartsCount === $lessonPartsCount) {
            UserLessonProgress::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'lesson_id' => $lesson_id,
                ],
                [
                    'completed_at' => now(),
                ]
            );
        } else {
            // Not all completed, remove lesson progress if exists
            UserLessonProgress::where('user_id', $user->id)
                ->where('lesson_id', $lesson_id)
                ->delete();
        }

        return response()->json([
            'status' => 'success',
            'message' => $status === 'complete' ? 'Lesson part marked as complete.' : 'Lesson part marked as incomplete.',
            'progress' => $progress,
            'completed' => $status === 'complete',
        ]);
    }


    
    public function create(){
        // TODO: Admin panel later
    }
    public function store(){
        // TODO: user progress
    }

    
}

