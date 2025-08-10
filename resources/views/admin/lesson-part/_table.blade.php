<div id="lesson-part-datatable-content" class="space-y-4">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3 sm:gap-0">
        <form id="search-form" method="GET" action="{{ route('admin.lesson-part.index', [$course->id, $learn->id]) }}"
            class="flex w-full sm:w-auto gap-2 flex-col sm:flex-row">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari bagian..."
                class="flex-grow px-4 py-2 bg-[#262626] text-white border border-white/10 rounded-lg focus:ring focus:ring-white/10 focus:border-white/10" />
            <button type="submit"
                class="px-4 py-2 bg-white/10 text-white text-sm rounded hover:bg-white/20 transition">
                Cari
            </button>
        </form>

        <a href="{{ route('admin.lesson-part.create', [$course->id, $learn->id]) }}"
            class="w-full sm:w-auto text-center px-4 py-2 bg-red-800 text-white text-sm rounded hover:bg-red-700 transition">
            Tambah Bagian
        </a>
    </div>

    <table class="min-w-full text-sm rounded-2xl overflow-hidden shadow-sm bg-white/5">
        <thead class="uppercase text-xs bg-white/10">
            <tr>
                <th class="px-4 py-3 text-left text-white/70">Nama</th>
                <th class="px-4 py-3 text-left text-white/70">Order</th>
                <th class="px-4 py-3 text-center text-white/70">Aksi</th>
                <th class="px-4 py-3 text-center text-white/70">Kuis</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-white/10">
            @forelse ($lessonParts as $part)
                <tr class="py-2">
                    <td class="px-4 py-2 font-medium">{{ $part->part_name }}</td>
                    <td class="px-4 py-2">{{ $part->order ?? '-' }}</td>
                    <td class="px-4 py-2 text-center flex gap-2 justify-center items-center">
                        {{-- Edit --}}
                        <a href="{{ route('admin.lesson-part.edit', [$course->id, $learn->id, $part->id]) }}"
                            class="text-white/80 hover:text-white" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        {{-- Delete --}}
                        <form method="POST"
                            action="{{ route('admin.lesson-part.destroy', [$course->id, $learn->id, $part->id]) }}"
                            class="inline" onsubmit="return confirm('Yakin ingin menghapus bagian ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-center py-2">
                        <a href="{{ route('admin.quiz.index', [$course->id, $learn->id, $part->id]) }}"><i
                                class="fa-solid text-bg-dark fa-arrow-right hover:text-white transition-all duration-200 aspect-square p-2 bg-white hover:bg-bg-card rounded-full"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">Tidak ada bagian pelajaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center text-sm mt-4 gap-2">
        <div>
            Menampilkan <span class="font-semibold">{{ $pagination['count'] }}</span> dari total
            <span class="font-semibold">{{ $pagination['total'] }}</span> bagian.
        </div>

        <div class="flex items-center gap-2">
            <div class="flex items-center gap-1 flex-wrap">
                {{-- Tombol Prev --}}
                @if ($pagination['prev'])
                    <a href="{{ $pagination['prev'] }}" data-page-url="{{ $pagination['prev'] }}"
                        class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg hover:bg-white/10 text-white transition aspect-square">
                        <i class="fa-solid fa-chevron-left w-3.5 flex items-center justify-center"></i>
                    </a>
                @else
                    <span
                        class="w-8 h-8 flex items-center justify-center border border-white/10 text-white/50 rounded-lg cursor-not-allowed aspect-square">
                        <i class="fa-solid fa-chevron-left w-3.5 flex items-center justify-center"></i>
                    </span>
                @endif

                {{-- Nomor halaman --}}
                @php
                    $current = $pagination['current_page'];
                    $last = $pagination['last_page'];
                    $range = 2;
                @endphp

                @for ($i = 1; $i <= $last; $i++)
                    @if ($i == 1 || $i == $last || ($i >= $current - $range && $i <= $current + $range))
                        @if ($i == $current)
                            <span
                                class="w-8 h-8 aspect-square flex justify-center items-center font-semibold bg-white/10 text-white rounded text-sm">
                                {{ $i }}
                            </span>
                        @else
                            <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}"
                                data-page-url="{{ request()->fullUrlWithQuery(['page' => $i]) }}"
                                class="w-8 h-8 aspect-square flex justify-center items-center border border-white/10 rounded hover:bg-white/5 transition text-sm">
                                {{ $i }}
                            </a>
                        @endif
                    @elseif ($i == 2 && $current - $range > 3)
                        <span class="w-8 h-8 flex items-center justify-center">…</span>
                        @php $i = $current - $range - 1; @endphp
                    @elseif ($i == $last - 1 && $current + $range < $last - 2)
                        <span class="w-8 h-8 flex items-center justify-center">…</span>
                        @php $i = $last - 1; @endphp
                    @endif
                @endfor

                {{-- Tombol Next --}}
                @if ($pagination['next'])
                    <a href="{{ $pagination['next'] }}" data-page-url="{{ $pagination['next'] }}"
                        class="w-8 h-8 flex items-center justify-center border border-white/10 rounded-lg hover:bg-white/10 text-white hover:text-white transition aspect-square">
                        <i class="fa-solid fa-chevron-right w-3.5 flex items-center justify-center"></i>
                    </a>
                @else
                    <span
                        class="w-8 h-8 flex items-center justify-center border border-white/10 text-white/50 rounded-lg cursor-not-allowed aspect-square">
                        <i class="fa-solid fa-chevron-right w-3.5 flex items-center justify-center"></i>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>