<div id="datatable-content" class="space-y-4">
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.quiz.create', [$course->id, $learn->id, $lessonPart->id]) }}"
            class="px-4 py-2 bg-accent-yellow text-black text-sm rounded hover:bg-yellow-500 transition">
            Tambah Quiz
        </a>
    </div>

    <table class="min-w-full text-sm border rounded-md overflow-hidden shadow-sm">
        <thead class="bg-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 text-left">Tipe</th>
                <th class="px-4 py-3 text-left">Pertanyaan</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700">
            @forelse ($quizzes as $index => $quiz)
                <tr>
                    {{-- Tipe --}}
                    <td class="px-4 py-2 font-semibold">
                        {{ ucfirst(str_replace('_', ' ', $quiz['quiz_type'] ?? '-')) }}
                    </td>

                    {{-- Pertanyaan --}}
                    <td class="px-4 py-2 max-w-md">
                        {!! isset($quiz['quiz_content']['question']) ? \Illuminate\Support\Str::limit(strip_tags($quiz['quiz_content']['question']), 60) : '[No question]' !!}
                    </td>

                    {{-- Aksi --}}
                    <td class="px-4 py-2 text-center flex items-center justify-center gap-2">
                        {{-- Edit --}}
                        <a href="{{ route('admin.quiz.edit', [$course->id, $learn->id, $lessonPart->id, $index]) }}"
                            class="text-blue-500 hover:text-blue-700" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        {{-- Hapus --}}
                        <form method="POST"
                            action="{{ route('admin.quiz.destroy', [$course->id, $learn->id, $lessonPart->id, $index]) }}"
                            class="inline" onsubmit="return confirm('Yakin ingin menghapus quiz ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">Tidak ada quiz ditemukan.</td>
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
