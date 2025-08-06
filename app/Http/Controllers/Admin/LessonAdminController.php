<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonAdminController extends Controller
{
    public function index(Request $request, $course_id)
    {
        $perPage = 10;

        $course = Course::findOrFail($course_id);
        $query = Lesson::where('course_id', $course_id)
            ->select('id', 'lesson_name', 'order', 'created_at');

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(lesson_name) LIKE ?', ['%' . strtolower($search) . '%']);
            });
        }

        $paginator = $query->orderBy('order')->paginate($perPage)->withQueryString();
        $lessons = $paginator->items();

        $pagination = [
            'count'         => $paginator->count(),
            'total'         => $paginator->total(),
            'next'          => $paginator->nextPageUrl(),
            'prev'          => $paginator->previousPageUrl(),
            'current_page'  => $paginator->currentPage(),
            'last_page'     => $paginator->lastPage(),
        ];

        if ($request->ajax()) {
            return view('admin.lessons._table', compact('lessons', 'pagination', 'course'));
        }

        
        return view('admin.lessons.index', compact('lessons', 'pagination', 'course'));
    }

    public function create(Course $course)
    {
        $isEdit = false;
        return view('admin.lessons.form', compact('isEdit', 'course'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'lesson_name' => 'required|string|max:255',
            'order'       => 'nullable|integer',
        ]);

        $validated['course_id'] = $course->id;

        Lesson::create($validated);

        return redirect()
            ->route('admin.learn.index', $course->id)
            ->with('success', 'Lesson berhasil dibuat.');
    }

    public function edit(Course $course, Lesson $learn)
    {
        $isEdit = true;
        $lesson = $learn; // alias untuk konsistensi
        return view('admin.lessons.form', compact('isEdit', 'course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $learn)
    {
        $validated = $request->validate([
            'lesson_name' => 'required|string|max:255',
            'order'       => 'nullable|integer',
        ]);

        $learn->update($validated);

        return redirect()
            ->route('admin.learn.index', $course->id)
            ->with('success', 'Lesson berhasil diperbarui.');
    }

    public function destroy(Course $course, Lesson $learn)
    {
        $learn->delete();

        return redirect()
            ->route('admin.learn.index', $course->id)
            ->with('success', 'Lesson berhasil dihapus.');
    }
}
