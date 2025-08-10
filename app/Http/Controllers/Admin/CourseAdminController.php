<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\DOCdnStorageService;

class CourseAdminController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10;

        $query = Course::select(
            'id',
            'course_name',
            'instructor',
            'image_url',
            'course_description',
            'created_at'
        );

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(course_name) LIKE ?', ['%' . strtolower($search) . '%'])
                    ->orWhereRaw('LOWER(course_description) LIKE ?', ['%' . strtolower($search) . '%'])
                    ->orWhereRaw('LOWER(instructor) LIKE ?', ['%' . strtolower($search) . '%']);
            });
        }

        $paginator = $query->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString();

        $courses = $paginator->items();

        $pagination = [
            'count'         => $paginator->count(),
            'total'         => $paginator->total(),
            'next'          => $paginator->nextPageUrl(),
            'prev'          => $paginator->previousPageUrl(),
            'current_page'  => $paginator->currentPage(),
            'last_page'     => $paginator->lastPage(),
        ];

        if ($request->ajax()) {
            return view('admin.courses._table', compact('courses', 'pagination'));
        }

        return view('admin.courses.index', compact('courses', 'pagination'));
    }

    public function create(){
        $isEdit = false;
        return view('admin.courses.form', compact('isEdit'));
    }

    public function store(Request $request, DOCdnStorageService $storage)
    {
        $request->validate([
            'course_name'        => 'required|string|max:255',
            'course_description' => 'required|string',
            'instructor'         => 'nullable|string|max:255',
            'thumbnail'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $course = new Course();
        $course->course_name = $request->course_name;
        $course->course_description = $request->course_description;
        $course->instructor = $request->instructor;

        // Upload image to DO CDN if provided
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $url = $storage->upload($file, 'courses');
            $course->image_url = $url;
        }

        $course->save();

        return redirect()
            ->route('admin.course.index')
            ->with('success', 'Course berhasil dibuat.');
    }
    
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.form', [
            'isEdit' => true,
            'course' => $course
        ]);
    }
    
    public function update(Request $request, Course $course, DOCdnStorageService $storage)
    {
        $request->validate([
            'course_name'        => 'required|string|max:255',
            'course_description' => 'required|string',
            'instructor'         => 'nullable|string|max:255',
            'thumbnail'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $course->course_name = $request->course_name;
        $course->course_description = $request->course_description;
        $course->instructor = $request->instructor;

        // Jika ada thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus file lama jika ada
            if ($course->image_url) {
                try {
                    $storage->delete($course->image_url);
                } catch (\Exception $e) {
                    return redirect()->route('admin.course.index')
                        ->with('error', 'Gagal menghapus gambar lama: ' . $e->getMessage());
                }
            }

            // Upload thumbnail baru ke DO CDN
            $file = $request->file('thumbnail');
            $url = $storage->upload($file, 'courses');
            $course->image_url = $url;
        }

        $course->save();

        return redirect()->route('admin.course.index')->with('success', 'Course berhasil diperbarui.');
    }

    
   public function destroy(Request $request, Course $course, DOCdnStorageService $storage)
    {
        $imageDeletionWarning = null;

        if ($course->image_url) {
            try {
                $storage->delete($course->image_url);
            } catch (\Exception $e) {
                // Continue deleting the course even if the image removal fails
                $imageDeletionWarning = 'Gagal menghapus gambar dari storage: ' . $e->getMessage();
            }
        }

        $course->delete();

        if ($request->ajax()) {
            // For AJAX requests, return no content so the client can refresh the table
            if ($imageDeletionWarning) {
                return response()->json(['warning' => $imageDeletionWarning], 200);
            }
            return response()->noContent();
        }

        $redirect = redirect()->route('admin.course.index')
            ->with('success', 'Course berhasil dihapus.');

        if ($imageDeletionWarning) {
            $redirect->with('warning', $imageDeletionWarning);
        }

        return $redirect;
    }

}