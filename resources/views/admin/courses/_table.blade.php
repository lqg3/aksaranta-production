<div id="datatable-content" class="space-y-4">

    <div class="flex justify-between items-center mb-4">
        <form id="search-form" method="GET" action="{{ route('admin.course.index') }}"
            class="flex gap-2 w-full sm:w-auto">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul..."
                class="w-full sm:w-64 px-4 py-2 bg-[#262626] text-white border border-accent-teal rounded-lg focus:ring focus:ring-accent-teal focus:border-accent-teal">
            <button type="submit"
                class="px-4 py-2 bg-accent-teal text-white text-sm rounded hover:bg-teal-600 transition">
                Cari
            </button>
        </form>

        <a href="{{ route('admin.course.create') }}"
            class="px-4 py-2 bg-accent-yellow text-black text-sm rounded hover:bg-yellow-500 transition">
            New Course
        </a>
    </div>

    <table class="min-w-full text-sm border rounded-md overflow-hidden shadow-sm">
        <thead class="bg-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">Thumbnail</th>
                <th class="px-4 py-3 text-left">Instruktor</th>
                <th class="px-4 py-3 text-left">Deskripsi</th>
                <th class="px-4 py-3 text-left">Dibuat</th>
                <th class="px-4 py-3 text-center">Aksi</th>
                <th class="px-4 py-3 text-center">Lesson</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-700">
            @forelse ($courses as $course)
                <tr>
                    {{-- Nama Kursus --}}
                    <td class="px-4 py-2 font-medium">{{ $course->course_name }}</td>

                    {{-- Gambar / Thumbnail --}}
                    <td class="px-4 py-2">
                        @if ($course->image_url)
                            <img src="{{ $course->image_url }}" alt="Thumbnail"
                                class="w-16 h-10 object-cover rounded shadow-sm">
                        @else
                            <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>

                    {{-- Instruktur --}}
                    <td class="px-4 py-2">{{ $course->instructor ?? '-' }}</td>

                    {{-- Deskripsi --}}
                    <td class="px-4 py-2 truncate" title="{{ $course->course_description }}">
                        {!! \Illuminate\Support\Str::limit($course->course_description, 50) !!}
                    </td>

                    {{-- Tanggal Dibuat --}}
                    <td class="px-4 py-2">{{ $course->created_at->format('d M Y') }}</td>

                    {{-- Aksi --}}
                    <td class="px-4 py-2 text-center gap-2 flex items-center">
                        {{-- Edit --}}
                        <a href="{{ route('admin.course.edit', $course->id) }}"
                            class="text-blue-500 hover:text-blue-700" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        {{-- Delete --}}
                        <form method="POST" action="{{ route('admin.course.destroy', $course->id) }}" class="inline" data-delete-course="1"
                            onsubmit="return confirm('Yakin ingin menghapus course ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.learn.index', $course->id) }}"><i
                                class="fa-solid text-bg-dark fa-arrow-right hover:text-white transition-all duration-200 aspect-square p-2 bg-white hover:bg-bg-card rounded-full"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>

    </table>

    {{-- Pagination --}}
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center text-sm mt-4 gap-2">
        <div>
            Menampilkan <span class="font-semibold">{{ $pagination['count'] }}</span> dari total
            <span class="font-semibold">{{ $pagination['total'] }}</span> data.
        </div>

        <div class="flex items-center gap-2">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center text-sm mt-4 gap-2">
                {{-- Navigasi pagination --}}
                <div class="flex items-center gap-1 flex-wrap">
                    {{-- Tombol Sebelumnya --}}
                    @if ($pagination['prev'])
                        <a href="{{ $pagination['prev'] }}" data-page-url="{{ $pagination['prev'] }}"
                            class="w-8 h-8 flex items-center justify-center border border-accent-yellow rounded-lg hover:bg-accent-yellow text-accent-yellow hover:text-white transition aspect-square">
                            <i class="fa-solid fa-chevron-left w-3.5 flex items-center justify-center"></i>
                        </a>
                    @else
                        <span
                            class="w-8 h-8 flex items-center justify-center border border-accent-yellow text-accent-yellow rounded-lg brightness-50 cursor-not-allowed aspect-square">
                            <i class="fa-solid fa-chevron-left w-3.5 flex items-center justify-center"></i>
                        </span>
                    @endif

                    {{-- Tombol angka halaman --}}
                    @php
                        $current = $pagination['current_page'];
                        $last = $pagination['last_page'];
                        $range = 2;
                    @endphp

                    @for ($i = 1; $i <= $last; $i++)
                        @if ($i == 1 || $i == $last || ($i >= $current - $range && $i <= $current + $range))
                            @if ($i == $current)
                                <span
                                    class="w-8 h-8 aspect-square flex justify-center items-center font-semibold bg-accent-yellow text-white rounded text-sm">
                                    {{ $i }}
                                </span>
                            @else
                                <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}"
                                    data-page-url="{{ request()->fullUrlWithQuery(['page' => $i]) }}"
                                    class="w-8 h-8 aspect-square flex justify-center items-center border border-accent-yellow rounded hover:bg-accent-yellow/50 transition text-sm">
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

                    {{-- Tombol Selanjutnya --}}
                    @if ($pagination['next'])
                        <a href="{{ $pagination['next'] }}" data-page-url="{{ $pagination['next'] }}"
                            class="w-8 h-8 flex items-center justify-center border border-accent-yellow rounded-lg hover:bg-accent-yellow text-accent-yellow hover:text-white transition aspect-square">
                            <i class="fa-solid fa-chevron-right w-3.5 flex items-center justify-center"></i>
                        </a>
                    @else
                        <span
                            class="w-8 h-8 flex items-center justify-center border border-accent-yellow text-accent-yellow rounded-lg brightness-50 cursor-not-allowed aspect-square">
                            <i class="fa-solid fa-chevron-right w-3.5 flex items-center justify-center"></i>
                        </span>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
