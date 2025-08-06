@extends('layouts.admin-layout')

@section('title', $isEdit ? 'Edit Bagian Pelajaran' : 'Buat Bagian Pelajaran')

@section('content')
    <div class="max-w-3xl mx-auto bg-bg-dark text-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6 text-accent-teal">
            {{ $isEdit ? 'Edit Bagian Pelajaran' : 'Buat Bagian Pelajaran' }} - 
            <span class="text-white">{{ $course->course_name }}</span> / 
            <span class="text-accent-yellow">{{ $learn->lesson_name }}</span>
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

            <!-- Part Name -->
            <div>
                <label for="part_name" class="block font-semibold mb-1 text-accent-teal">Nama Bagian</label>
                <input type="text" name="part_name" id="part_name"
                    value="{{ old('part_name', $lessonPart->part_name ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg focus:ring focus:ring-accent-teal focus:border-accent-teal"
                    required>
            </div>

            <!-- Description -->
            <div>
                <label for="part_description" class="block font-semibold mb-1 text-accent-teal">Deskripsi (Opsional)</label>
                <textarea name="part_description" id="part_description" rows="3"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg focus:ring focus:ring-accent-teal focus:border-accent-teal"
                >{{ old('part_description', $lessonPart->part_description ?? '') }}</textarea>
            </div>

            <!-- Video URL -->
            <div>
                <label for="part_video_url" class="block font-semibold mb-1 text-accent-teal">URL Video (Opsional)</label>
                <input type="url" name="part_video_url" id="part_video_url"
                    value="{{ old('part_video_url', $lessonPart->part_video_url ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg focus:ring focus:ring-accent-teal focus:border-accent-teal">
            </div>

            <!-- Part Content -->
            <div>
                <label for="part_content" class="block font-semibold mb-1 text-accent-teal">Konten Teks (Opsional)</label>
                <textarea name="part_content" id="part_content" rows="5"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg focus:ring focus:ring-accent-teal focus:border-accent-teal"
                >{{ old('part_content', $lessonPart->part_content ?? '') }}</textarea>
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block font-semibold mb-1 text-accent-teal">Urutan (Opsional)</label>
                <input type="number" name="order" id="order"
                    value="{{ old('order', $lessonPart->order ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg focus:ring focus:ring-accent-teal focus:border-accent-teal">
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button type="submit"
                    class="bg-accent-yellow hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-lg transition">
                    {{ $isEdit ? 'Update' : 'Simpan' }} Bagian
                </button>
            </div>
        </form>
    </div>
@endsection
