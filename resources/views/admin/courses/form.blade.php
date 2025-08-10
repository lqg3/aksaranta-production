@extends('layouts.admin-layout')

@section('title', $isEdit ? 'Edit Course' : 'Buat Course Baru')

@section('head-scripts')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin">
    </script>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto bg-white/5 text-white shadow-md rounded-3xl p-8">
        <h1 class="text-2xl font-bold mb-6 text-white/80">
            {{ $isEdit ? 'Edit Course' : 'Buat Course Baru' }}
        </h1>

        <form method="POST" enctype="multipart/form-data"
            action="{{ $isEdit ? route('admin.course.update', $course) : route('admin.course.store') }}" class="space-y-6">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <!-- Course Name -->
            <div>
                <label for="course_name" class="block font-semibold mb-1 text-white/80">Nama Course</label>
                <input required type="text" name="course_name" id="course_name"
                    value="{{ old('course_name', $course->course_name ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10"
                    >
            </div>

            <!-- Instructor -->
            <div>
                <label for="instructor" class="block font-semibold mb-1 text-white/80">Instructor</label>
                <input required type="text" name="instructor" id="instructor"
                    value="{{ old('instructor', $course->instructor ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10">
            </div>

            <!-- Course Description -->
            <div>
                <label for="course_description" class="block font-semibold mb-1 text-white/80">Deskripsi</label>
                <textarea name="course_description" id="course_description" rows="3"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10">{{ old('course_description', $course->course_description ?? '') }}</textarea>
            </div>

            <!-- Preview Image -->
            <div id="preview-container" class="mb-4">
                @if ($isEdit && !empty($course->image_url))
                    <p class="text-sm text-gray-300 mb-1">Gambar saat ini:</p>
                    <img id="thumbnail-preview" src="{{ $course->image_url }}" alt="Thumbnail" class="w-48 rounded shadow">
                @else
                    <img id="thumbnail-preview" class="w-48 rounded shadow hidden" />
                @endif
            </div>

            <!-- Upload Image -->
            <label for="thumbnail"
                class="flex items-center bg-white/10 hover:bg-white/20 text-white text-base font-medium px-4 py-2.5 rounded w-max cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mr-2 fill-white" viewBox="0 0 32 32">
                    <path
                        d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z" />
                    <path
                        d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z" />
                </svg>
                Upload Gambar
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*" class="hidden" />
            </label>

            <!-- Submit Buttons -->
            <div class="pt-4">
                <button type="submit"
                    class="bg-red-800 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                    {{ $isEdit ? 'Update' : 'Simpan' }} Course
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const fileInput = document.getElementById('thumbnail');
            const previewImage = document.getElementById('thumbnail-preview');

            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
