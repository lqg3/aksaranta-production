<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonPart;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class QuizAdminController extends Controller
{

    public function validateQuiz(Request $request)
    {
        $request->validate([
            'quiz_type' => 'required|in:multiple_choice,drag_and_drop,fill_in_the_blank',
            'quiz_content' => 'required|array',
        ]);
        
        $type = $request->input('quiz_type');
        $content = $request->input('quiz_content');
        
        if ($type === 'multiple_choice') {
            // Pastikan semua 4 pilihan ada dan tidak kosong
            if (
                !isset($content['options']) || 
                !is_array($content['options']) || 
                count($content['options']) !== 4 ||
                !isset($content['correct_option'])
            ) {
                throw ValidationException::withMessages([
                    'quiz_content.options' => 'Harus ada 4 pilihan.'
                ]);
            }
            foreach ($content['options'] as $i => $opt) {
                if (empty($opt['option_text'])) {
                    throw ValidationException::withMessages([
                        "quiz_content.options.$i.option_text" => "Pilihan ke-" . ($i+1) . " harus diisi."
                    ]);
                }
            }

            // Pastikan correct_option ada dan index valid 0-3
            if (!isset($content['correct_option']) || !in_array($content['correct_option'], ['0', '1', '2', '3'], true)) {
                throw ValidationException::withMessages([
                    'quiz_content.correct_option' => 'Harus memilih jawaban yang benar.'
                ]);
            }

        } elseif ($type === 'drag_and_drop') {
            if (empty($content['question'])) {
                throw ValidationException::withMessages([
                    'quiz_content.question' => 'Instruksi soal harus diisi.'
                ]);
            }
            if (!isset($content['pairs']) || !is_array($content['pairs']) || count($content['pairs']) === 0) {
                throw ValidationException::withMessages([
                    'quiz_content.pairs' => 'Harus ada minimal satu pasang item dan tempat drop.'
                ]);
            }
            foreach ($content['pairs'] as $i => $pair) {
                if (empty($pair['item'])) {
                    throw ValidationException::withMessages([
                        "quiz_content.pairs.$i.item" => "Item pada pasangan ke-" . ($i+1) . " harus diisi."
                    ]);
                }
                if (empty($pair['target'])) {
                    throw ValidationException::withMessages([
                        "quiz_content.pairs.$i.target" => "Tempat drop pada pasangan ke-" . ($i+1) . " harus diisi."
                    ]);
                }
            }

        } elseif ($type === 'fill_in_the_blank') {
            if (empty($content['question'])) {
                throw ValidationException::withMessages([
                    'quiz_content.question' => 'Teks soal harus diisi.'
                ]);
            }
            if (empty($content['answer'])) {
                throw ValidationException::withMessages([
                    'quiz_content.answer' => 'Jawaban harus diisi.'
                ]);
            }
        }

        // Jika lolos semua validasi, return true
        return true;
    }

    public function index($course_id, $learn_id, $lesson_part)
    {
        $lessonPart = LessonPart::findOrFail($lesson_part);
        $quizzes = $lessonPart->quiz_content ?? [];
        $course = Course::findOrFail($course_id);
        $learn = Lesson::findOrFail($learn_id);

        return view('admin.quizzes.index', compact('lessonPart', 'quizzes','course', 'learn'));
    }
    
    public function create($course_id, $learn_id, $lesson_part)
    {
        $lessonPart = LessonPart::findOrFail($lesson_part);
        $isEdit = false;
        $course = Course::findOrFail($course_id);
        $learn = Lesson::findOrFail($learn_id);
        return view('admin.quizzes.form', compact('lessonPart', 'isEdit', 'course', 'learn'));
    }

    public function store(Request $request, $course, $learn, $lesson_part)
    {
        $this->validateQuiz($request);

        $lessonPart = LessonPart::findOrFail($lesson_part);

        // Ambil quiz_content yang sudah ada (default [] kalau null)
        $quizzes = $lessonPart->quiz_content ?? [];

        // Tambahkan quiz baru
        $quizzes[] = [
            'quiz_type' => $request['quiz_type'],
            'quiz_content' => $request['quiz_content'],
        ];

        // Update field
        $lessonPart->quiz_content = $quizzes;
        $lessonPart->save();

        return redirect()
            ->route('admin.quiz.index', [$course, $learn, $lesson_part])
            ->with('success', 'Quiz berhasil ditambahkan.');
    }

    public function edit($course_id, $learn_id, $lesson_part, $quizId)
    {
        $lessonPart = LessonPart::findOrFail($lesson_part);
        $quizzes = $lessonPart->quiz_content ?? [];

        if (!isset($quizzes[$quizId])) {
            abort(404);
        }

        $quiz = $quizzes[$quizId];
        $isEdit = true;

        $course = Course::findOrFail($course_id);
        $learn = Lesson::findOrFail($learn_id);

        return view('admin.quizzes.form', compact(
            'lessonPart',
            'quizzes',
            'course',
            'learn',
            'quiz',
            'quizId',
            'isEdit'
        ));
    }




    public function update(Request $request, $course, $learn, $lesson_part, $quizId)
    {
        $this->validateQuiz($request);

        $lessonPart = LessonPart::findOrFail($lesson_part);

        $quizzes = $lessonPart->quiz_content ?? [];

        // Pastikan quizzes adalah koleksi agar bisa map dan values dengan mudah
        $quizzes = collect($quizzes);

        if (!isset($quizzes[$quizId])) {
            return back()->with('error', 'Quiz tidak ditemukan.');
        }

        // Update quiz pada index $quizId
        $quizzes[$quizId] = [
            'quiz_type' => $request->input('quiz_type'),
            'quiz_content' => $request->input('quiz_content'),
        ];

        // Simpan ulang dengan reindex dan ke JSON
        $lessonPart->quiz_content = $quizzes->values()->toArray();

        $lessonPart->save();

        return redirect()
            ->route('admin.quiz.index', [$course, $learn, $lesson_part])
            ->with('success', 'Quiz berhasil diperbarui.');
    }


    public function destroy($course, $learn, $lesson_part, $quizId)
    {
        $lessonPart = LessonPart::findOrFail($lesson_part);

        $quizzes = collect($lessonPart->quiz_content ?? []);

        // Cek apakah index quizId ada di array
        if (!isset($quizzes[$quizId])) {
            return back()->with('error', 'Quiz tidak ditemukan.');
        }

        // Hapus quiz berdasarkan index
        $quizzes->splice($quizId, 1); // hapus 1 item mulai dari index $quizId

        // Simpan ulang ke database (pastikan disimpan sebagai array / JSON)
        $lessonPart->quiz_content = $quizzes->values()->toArray();
        $lessonPart->save();

        return redirect()->back()->with('success', 'Quiz berhasil dihapus.');
    }
}
