@props(['course', 'lesson', 'lessonPart', 'lessonName', 'completed', 'isLogged'])

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ $lessonName }} - Aksaranta</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="bg-bg-dark flex flex-col justify-center items-center text-text-primary" x-data="lessonPage()"
        x-init="init()">

        <!-- Navigation - outside transition wrapper so it stays static -->
        @include('components.user-nav')

        <!-- Loading overlay -->
        <div x-show="isLoading" x-transition:enter="transition ease-out duration-600"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-600" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-bg-dark flex items-center justify-center z-50">
        </div>

        <!-- Main content wrapper -->
        <div x-cloak x-show="!isLoading" x-transition:enter="transition ease-in duration-600"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-out duration-600" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="w-full flex flex-col justify-center items-center">

            <section class="mt-24 md:w-[80%] w-[90%]">
                <!-- Breadcrumbs -->
                <div class="flex md:flex-col sm:flex-col flex-col lg:flex-row gap-4 lg:justify-between align-middle">
                    <ul class="text-white/40 flex gap-2">
                        <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">
                            <a href="#" @click.prevent="navigateTo('/learn')">Learn</a>
                        </li>
                        <li class="!text-white/40">></li>
                        <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">
                            <a href="#"
                                @click.prevent="navigateTo('{{ route('learn.course', ['slug' => $course->slug]) }}')">
                                {{ $course->course_name }} </a>
                        </li>
                        <li class="!text-white/40">></li>
                        <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">
                            <a href="#"
                                @click.prevent="navigateTo('{{ route('learn.course', ['slug' => $course->slug]) }}')">
                                {{ $lessonName }} </a>
                        </li>
                        <li class="!text-white/40">></li>
                        <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">Video
                        </li>
                    </ul>
                </div>

                <!-- Course Title -->
                <h1 class="text-text-primary font-semibold lg:text-title md:text-4xl sm:text-4xl mt-4 ">
                    {{ $lessonName }} </h1>
                <p class="text-white/70 text-lg mt-4"> </p>

                <!-- Lesson Progress Tabs -->
                <div class="bg-bg-card bg-opacity-10 w-100 rounded-lg">
                    <ul class="flex text-center">
                        <li class="cursor-pointer hover:bg-bg-card hover:bg-opacity-50 transition-all duration-600 flex-1 py-3 text-center border border-white/20 rounded-l-lg"
                            :class="{ 'bg-bg-card bg-opacity-30': activeTab === 'video' }"
                            @click="switchTab('video')" id="video-button">Video</li>
                        <li class="cursor-pointer hover:bg-bg-card hover:bg-opacity-50 transition-all duration-600 flex-1 py-3 text-center border border-white/20"
                            :class="{ 'bg-bg-card bg-opacity-30': activeTab === 'notes' }"
                            @click="switchTab('notes')" id="notes-button">Notes</li>
                        <li class="cursor-pointer hover:bg-bg-card hover:bg-opacity-50 transition-all duration-600 flex-1 py-3 text-center border border-white/20 rounded-r-lg"
                            :class="{ 'bg-bg-card bg-opacity-30': activeTab === 'quiz' }" @click="switchTab('quiz')"
                            id="quiz-button">Quiz</li>
                    </ul>
                </div>
            </section>

            <main class="container mt-6 mb-12 md:w-[80%] w-[90%]">
                {{ $slot }}

                <!-- User Controls -->
                <div class="flex justify-between w-full mt-12 flex-wrap gap-4">
                    <div class="flex gap-3 items-center">
                        @if ($isLogged)
                            <template x-if="completed">
                                <p class="bg-green-700 bg-opacity-70 p-2 px-4 rounded-full text-white font-semibold">
                                    Sudah Selesai</p>
                            </template>
                            <template x-if="!completed">
                                <p class="bg-red-800 bg-opacity-50 p-2 px-4 rounded-full text-white font-semibold">Belum
                                    Selesai</p>
                            </template>

                            <!-- Button action dengan icon dan tooltip -->
                            <button @click="toggleComplete()" :disabled="loading"
                                :class="completed ? 'bg-gray-600' :
                                    'bg-accent-teal hover:bg-teal-600 cursor-pointer'"
                                class="relative flex items-center gap-2 text-white rounded px-4 py-2 transition disabled:opacity-50 disabled:cursor-not-allowed"
                                aria-label="Tandai tugas sebagai selesai atau batalkan status selesai">
                                <template x-if="!completed">
                                    <!-- Icon centang -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Tandai selesai
                                </template>
                                <template x-if="completed">
                                    <!-- Icon silang -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Batalkan selesai
                                </template>
                            </button>

                            <!-- Keterangan yang selalu tampil di bawah tombol -->
                            <p class="mt-1 text-xs text-gray-600 select-none">
                                <span x-show="!completed" x-cloak class="text-gray-400">Tandai tugas ini sebagai
                                    selesai</span>
                                <span x-show="completed" x-cloak class="text-gray-400">Batalkan status selesai tugas
                                    ini</span>
                            </p>
                        @else
                            <p class="text-yellow-400 font-semibold">Silakan <a href="{{ route('login') }}"
                                    class="underline">login</a> untuk menyimpan progres Anda.</p>
                        @endif
                    </div>

                    <div class="bg-accent-teal p-2 px-4 rounded-full flex items-center justify-center gap-2 cursor-pointer hover:bg-opacity-80 transition-all duration-600"
                        @click="navigateToNext()">
                        <p>Daftar Pelajaran</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-white" viewBox="0 0 640 640">
                            <path
                                d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z" />
                        </svg>
                    </div>
                </div>


            </main>
        </div>

        <script>
            function lessonPage() {
                return {
                    isLoading: true,
                    activeTab: 'video',
                    completed: @json($completed ?? false), // ini status awal dari backend
                    loading: false,

                    init() {
                        // CSRF for axios
                        const token = document.querySelector('meta[name="csrf-token"]');
                        if (token) {
                            axios.defaults.headers.common['X-CSRF-TOKEN'] = token.getAttribute('content');
                        }

                        // Show fade in after ready
                        setTimeout(() => {
                            this.isLoading = false;
                        }, 150);

                        // Hash tab init
                        this.setTabFromHash();
                        window.addEventListener('hashchange', () => this.setTabFromHash());
                    },

                    setTabFromHash() {
                        const hash = window.location.hash.replace('#', '');
                        if (['video', 'notes', 'quiz'].includes(hash)) {
                            this.activeTab = hash;
                        } else {
                            this.activeTab = 'video';
                        }
                    },

                    switchTab(tab) {
                        this.activeTab = tab;
                        window.location.hash = tab;
                    },

                    async toggleComplete() {
                        if (this.loading) return;
                        this.loading = true;
                        try {
                            const res = await axios.post(
                                '/learn/{{ $course->id }}/{{ $lesson->id }}/{{ $lessonPart->id }}/toggle-complete'
                            );
                            if (res.data.status === 'success') {
                                this.completed = res.data.completed;
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'success',
                                    title: res.data.message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            } else {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'error',
                                    title: 'Gagal mengupdate status',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            }
                        } catch (error) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Terjadi error pada server',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            console.error(error);
                        } finally {
                            this.loading = false;
                        }
                    },

                    async navigateTo(url) {
                        this.isLoading = true;
                        try {
                            await new Promise(r => setTimeout(r, 600));
                            window.location.href = url;
                        } catch (e) {
                            console.error(e);
                            this.isLoading = false;
                            window.location.href = url;
                        }
                    },

                    async navigateToNext() {
                        // TODO: logic next lesson
                        await this.navigateTo('/learn');
                    }
                }
            }
        </script>
    </body>

</html>
