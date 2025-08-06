<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonPart;
use Illuminate\Http\Request;

class LessonPartAdminController extends Controller
{
    public function index(Course $course, Lesson $learn)
    {
        $perPage = 10;

        $query = LessonPart::where('lesson_id', $learn->id)
            ->select('id', 'part_name', 'order', 'created_at');

        if ($search = request()->query('search')) {
            $query->whereRaw('LOWER(part_name) LIKE ?', ['%' . strtolower($search) . '%']);
        }

        $paginator = $query->orderBy('order')->paginate($perPage)->withQueryString();
        $lessonParts = $paginator->items();

        $pagination = [
            'count'         => $paginator->count(),
            'total'         => $paginator->total(),
            'next'          => $paginator->nextPageUrl(),
            'prev'          => $paginator->previousPageUrl(),
            'current_page'  => $paginator->currentPage(),
            'last_page'     => $paginator->lastPage(),
        ];

        if (request()->ajax()) {
            return view('admin.lesson-part._table', compact('lessonParts', 'pagination', 'course', 'learn'));
        }
        return view('admin.lesson-part.index', compact('lessonParts', 'pagination', 'course', 'learn'));
    }

    public function create(Course $course, Lesson $learn)
    {
        $isEdit = false;
        return view('admin.lesson-part.form', compact('isEdit', 'course', 'learn'));
    }

    public function store(Request $request, Course $course, Lesson $learn)
    {
        $validated = $request->validate([
            'part_name'        => 'required|string|max:255',
            'part_description' => 'nullable|string',
            'part_video_url'   => 'nullable|url',
            'part_content'     => 'nullable|string',
            'order'            => 'nullable|integer',
        ]);

        $validated['lesson_id'] = $learn->id;

        LessonPart::create($validated);

        return redirect()
            ->route('admin.lesson-part.index', [$course->id, $learn->id])
            ->with('success', 'Bagian pelajaran berhasil dibuat.');
    }

    public function edit(Course $course, Lesson $learn, LessonPart $lessonPart)
    {
        $isEdit = true;
        return view('admin.lesson-part.form', compact('isEdit', 'course', 'learn', 'lessonPart'));
    }

    public function update(Request $request, Course $course, Lesson $learn, LessonPart $lessonPart)
    {
        $validated = $request->validate([
            'part_name'        => 'required|string|max:255',
            'part_description' => 'nullable|string',
            'part_video_url'   => 'nullable|url',
            'part_content'     => 'nullable|string',
            'order'            => 'nullable|integer',
        ]);

        $lessonPart->update($validated);

        return redirect()
            ->route('admin.lesson-part.index', [$course->id, $learn->id])
            ->with('success', 'Bagian pelajaran berhasil diperbarui.');
    }

    public function destroy(Course $course, Lesson $learn, LessonPart $lessonPart)
    {
        $lessonPart->delete();

        return redirect()
            ->route('admin.lesson-part.index', [$course->id, $learn->id])
            ->with('success', 'Bagian pelajaran berhasil dihapus.');
    }
}
