@extends('layouts.admin-layout')

@section('title', $isEdit ? 'Edit Lesson' : 'Buat Lesson Baru')

@section('content')
    <div class="max-w-3xl mx-auto bg-white/5 text-white shadow-md rounded-3xl p-8">
        <h1 class="text-2xl font-bold mb-6 text-white/80">
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

            <div>
                <label for="lesson_name" class="block font-semibold mb-1 text-white/80">Nama Lesson</label>
                <input type="text" name="lesson_name" id="lesson_name"
                    value="{{ old('lesson_name', $lesson->lesson_name ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10"
                    required>
            </div>

            <div>
                <label for="order" class="block font-semibold mb-1 text-white/80">Urutan (Opsional)</label>
                <input type="number" name="order" id="order"
                    value="{{ old('order', $lesson->order ?? '') }}"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10">
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="bg-red-800 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                    {{ $isEdit ? 'Update' : 'Simpan' }} Lesson
                </button>
            </div>
        </form>
    </div>
@endsection