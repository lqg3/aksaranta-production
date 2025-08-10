<div id="datatable-content" class="space-y-4">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.quiz.create', [$course->id, $learn->id, $lessonPart->id]) }}"
            class="px-4 py-2 bg-red-800 text-white text-sm rounded hover:bg-red-700 transition">
            Tambah Quiz
        </a>
    </div>

    <table class="min-w-full text-sm rounded-2xl overflow-hidden shadow-sm bg-white/5">
        <thead class="uppercase text-xs bg-white/10">
            <tr>
                <th class="px-4 py-3 text-left text-white/70">Tipe</th>
                <th class="px-4 py-3 text-left text-white/70">Pertanyaan</th>
                <th class="px-4 py-3 text-center text-white/70">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/10">
            @forelse ($quizzes as $index => $quiz)
                <tr>
                    {{-- Tipe --}}
                    <td class="px-4 py-2 font-semibold">
                        {{ ucfirst(str_replace('_', ' ', $quiz['quiz_type'] ?? '-')) }}
                    </td>

                    {{-- Pertanyaan --}}
                    <td class="px-4 py-2 max-w-md">
                        {!! isset($quiz['quiz_content']['question'])
                            ? \Illuminate\Support\Str::limit(strip_tags($quiz['quiz_content']['question']), 60)
                            : '[No question]' !!}
                    </td>

                    {{-- Aksi --}}
                    <td class="px-4 py-2 text-center flex items-center justify-center gap-2">
                        {{-- Edit --}}
                        <a href="{{ route('admin.quiz.edit', [$course->id, $learn->id, $lessonPart->id, $index]) }}"
                            class="text-white/80 hover:text-white" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        {{-- Hapus --}}
                        <form method="POST"
                            action="{{ route('admin.quiz.destroy', [$course->id, $learn->id, $lessonPart->id, $index]) }}"
                            class="inline py-2" onsubmit="return confirm('Yakin ingin menghapus quiz ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">Tidak ada quiz ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="flex justify-between items-center mt-4 text-sm">
        <div>
            Menampilkan <strong>{{ count($quizzes) }}</strong> quiz.
        </div>
    </div>
</div>
