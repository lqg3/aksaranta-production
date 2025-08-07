@extends('layouts.admin-layout')

@section('title', $isEdit ? 'Edit Quiz' : 'Buat Quiz Baru')

@section('content')
    <div class="max-w-4xl mx-auto bg-bg-dark text-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6 text-accent-teal">
            {{ $isEdit ? 'Edit Quiz' : 'Buat Quiz Baru' }} - <span
                class="text-white">{{ $lessonPart->title ?? 'Lesson Part' }}</span>
        </h1>

        <form method="POST"
            action="{{ $isEdit
                ? route('admin.quiz.update', [$course->id, $learn->id, $lessonPart->id, $quizId])
                : route('admin.quiz.store', [$course->id, $learn->id, $lessonPart->id]) }}"
            class="space-y-6">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            {{-- Quiz Type --}}
            <div>
                <label for="quiz_type" class="block font-semibold mb-1 text-accent-teal">Tipe Soal</label>
                <select name="quiz_type" id="quiz_type"
                    class="w-full px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg" required
                    onchange="handleTypeChange()">
                    @php
                        $quizType = old('quiz_type') ?? ($quiz['quiz_type'] ?? '');
                    @endphp

                    <option value="multiple_choice" {{ $quizType == 'multiple_choice' ? 'selected' : '' }}>Multiple Choice
                    </option>
                    <option value="drag_and_drop" {{ $quizType == 'drag_and_drop' ? 'selected' : '' }}>Drag & Drop</option>
                    <option value="fill_in_the_blank" {{ $quizType == 'fill_in_the_blank' ? 'selected' : '' }}>Isian Kosong
                    </option>
                </select>
            </div>

            {{-- Quiz Content (Dynamic Based on Type) --}}
            <div id="quiz-content-fields">
                <!-- Will be populated by JS based on quiz_type -->
            </div>

            {{-- Submit --}}
            <div class="pt-4">
                <button type="submit"
                    class="bg-accent-yellow hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-lg transition">
                    {{ $isEdit ? 'Update' : 'Simpan' }} Quiz
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        window.quizContent = {!! json_encode($quiz['quiz_content'] ?? []) !!};
        window.isEdit = {{ $isEdit ? 'true' : 'false' }};
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            handleTypeChange();
        });

        function handleTypeChange() {
            const type = document.getElementById('quiz_type').value;
            const container = document.getElementById('quiz-content-fields');
            const data = window.quizContent || {};
            const isEdit = window.isEdit;

            container.innerHTML = '';

            if (type === 'multiple_choice') {
                const question = isEdit ? (data.question || '') : '';

                container.innerHTML += `
                <div>
                    <label class="block font-semibold mb-1 text-accent-teal">Pertanyaan</label>
                    <input type="text" name="quiz_content[question]" value="${question}" class="w-full px-4 py-2 bg-[#262626] border border-accent-teal rounded-lg text-white" required>
                </div>
            `;

                const options = isEdit ? data.options || [] : [];
                const correct = isEdit ? data.correct_option : null;

                let optionsHTML =
                    '<div class="space-y-2 mt-4"><label class="block font-semibold text-accent-teal">Pilihan & Jawaban Benar</label>';

                for (let i = 0; i < 4; i++) {
                    const optionText = options[i]?.option_text || '';
                    const checked = correct == i ? 'checked' : '';
                    optionsHTML += `
                    <div class="flex items-center gap-4">
                        <input type="text" name="quiz_content[options][${i}][option_text]" placeholder="Pilihan ${i + 1}" value="${optionText}" class="flex-1 px-4 py-2 bg-[#262626] border border-gray-600 rounded-lg text-white">
                        <label class="flex items-center text-sm">
                            <input type="radio" name="quiz_content[correct_option]" value="${i}" class="mr-2" ${checked}> Benar
                        </label>
                    </div>
                `;
                }

                optionsHTML += '</div>';
                container.innerHTML += optionsHTML;

            } else if (type === 'drag_and_drop') {
                const question = isEdit ? (data.question || '') : '';
                const pairs = isEdit ? (data.pairs || []) : [];

                container.innerHTML += `
                <div>
                    <label class="block font-semibold mb-1 text-accent-teal">Instruksi Soal</label>
                    <input type="text" name="quiz_content[question]" value="${question}" class="w-full px-4 py-2 bg-[#262626] border border-accent-teal rounded-lg text-white" required>
                </div>
            `;

                let pairsHTML = `<div class="space-y-2 mt-4">
                <label class="block font-semibold text-accent-teal">Item dan Tempat Drop</label>`;

                for (let i = 0; i < 3; i++) {
                    const item = pairs[i]?.item || '';
                    const target = pairs[i]?.target || '';
                    pairsHTML += `
                    <div class="flex gap-4">
                        <input type="text" name="quiz_content[pairs][${i}][item]" placeholder="Item" value="${item}" class="flex-1 px-4 py-2 bg-[#262626] border border-gray-600 rounded-lg text-white">
                        <input type="text" name="quiz_content[pairs][${i}][target]" placeholder="Tempat Drop" value="${target}" class="flex-1 px-4 py-2 bg-[#262626] border border-gray-600 rounded-lg text-white">
                    </div>
                `;
                }

                pairsHTML += '</div>';
                container.innerHTML += pairsHTML;

            } else if (type === 'fill_in_the_blank') {
                const question = isEdit ? (data.question || '') : '';
                const answer = isEdit ? (data.answer || '') : '';

                container.innerHTML += `
                <div>
                    <label class="block font-semibold mb-1 text-accent-teal">Teks dengan ____ untuk bagian kosong</label>
                    <textarea name="quiz_content[question]" rows="4" class="w-full px-4 py-2 bg-[#262626] border border-accent-teal rounded-lg text-white" required>${question}</textarea>
                </div>
                <div class="mt-2">
                    <label class="block font-semibold text-accent-teal">Jawaban yang benar</label>
                    <input type="text" name="quiz_content[answer]" value="${answer}" class="w-full px-4 py-2 bg-[#262626] border border-gray-600 rounded-lg text-white" required>
                </div>
            `;
            }
        }
    </script>
@endpush
