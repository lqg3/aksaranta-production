@extends('layouts.admin-layout')

@section('title', $isEdit ? 'Edit Bagian Pelajaran' : 'Buat Bagian Pelajaran')

@section('head-scripts')
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin">
    </script>
@endsection

@section('content')
    <div class="max-w-3xl mx-auto bg-white/5 text-white shadow-md rounded-3xl p-8">
        <h1 class="text-2xl font-bold mb-6 text-white/80">
            {{ $isEdit ? 'Edit Bagian Pelajaran' : 'Buat Bagian Pelajaran' }} -
            <span class="text-white">{{ $course->course_name }}</span> /
            <span class="text-white">{{ $learn->lesson_name }}</span>
        </h1>

        <form method="POST"
            action="{{ $isEdit
                ? route('admin.lesson-part.update', [$course->id, $learn->id, $lessonPart->id])
                : route('admin.lesson-part.store', [$course->id, $learn->id]) }}"
            class="space-y-6">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <div>
                <label for="part_name" class="block font-semibold mb-1 text-white/80">Nama Bagian</label>
                <input required type="text" name="part_name" id="part_name"
                    value="{{ old('part_name', $lessonPart->part_name ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10">
            </div>

            <div>
                <label for="part_description" class="block font-semibold mb-1 text-white/80">Deskripsi (Opsional)</label>
                <textarea name="part_description" id="part_description" rows="3"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10">{{ old('part_description', $lessonPart->part_description ?? '') }}</textarea>
            </div>

            <div>
                <label for="part_video_url" class="block font-semibold mb-1 text-white/80">URL Video (Embed)</label>
                <input required type="url" name="part_video_url" id="part_video_url"
                    value="{{ old('part_video_url', $lessonPart->part_video_url ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10">
            </div>

            <div>
                <label for="part_content" class="block font-semibold mb-1 text-white/80">Konten Teks</label>
                <textarea name="part_content" id="part_content">{{ old('part_content', $lessonPart->part_content ?? '') }}</textarea>
            </div>

            <div>
                <label for="order" class="block font-semibold mb-1 text-white/80">Urutan</label>
                <input required type="number" name="order" id="order"
                    value="{{ old('order', $lessonPart->order ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10">
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="bg-red-800 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                    {{ $isEdit ? 'Update' : 'Simpan' }} Bagian
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: 'textarea#part_content',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | image link | code',
                height: 400,
                menubar: false,
                branding: false,
                skin: "oxide-dark",
                content_css: "dark",
                license_key: 'gpl',
            });
        });
    </script>
@endpush
