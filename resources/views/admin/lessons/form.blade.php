@extends('layouts.admin-layout')

@section('title', $isEdit ? 'Edit Lesson' : 'Buat Lesson Baru')

@section('content')
    <div class="max-w-3xl mx-auto bg-bg-dark text-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6 text-accent-teal">
            {{ $isEdit ? 'Edit Lesson' : 'Buat Lesson Baru' }} - <span class="text-white">{{ $course->course_name }}</span>
        </h1>

        <form method="POST"
            action="{{ $isEdit 
                ? route('admin.learn.update', [$course->id, $lesson->id]) 
                : route('admin.learn.store', $course->id) }}" 
            class="space-y-6">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <!-- Lesson Name -->
            <div>
                <label for="lesson_name" class="block font-semibold mb-1 text-accent-teal">Nama Lesson</label>
                <input type="text" name="lesson_name" id="lesson_name"
                    value="{{ old('lesson_name', $lesson->lesson_name ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg focus:ring focus:ring-accent-teal focus:border-accent-teal"
                    required>
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block font-semibold mb-1 text-accent-teal">Urutan (Opsional)</label>
                <input type="number" name="order" id="order"
                    value="{{ old('order', $lesson->order ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg focus:ring focus:ring-accent-teal focus:border-accent-teal">
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="bg-accent-yellow hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-lg transition">
                    {{ $isEdit ? 'Update' : 'Simpan' }} Lesson
                </button>
            </div>
        </form>
    </div>
@endsection
