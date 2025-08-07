<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$lessonName}} - Aksaranta</title> <!-- TODO -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-bg-dark flex flex-col justify-center items-center text-text-primary" 
      x-data="{
        ...pageTransition(),
        activeTab: 'video',
        setTabFromHash() {
            const hash = window.location.hash.replace('#', '');
            if(['video', 'notes', 'quiz'].includes(hash)) {
                this.activeTab = hash;
            } else {
                this.activeTab = 'video';
            }
        },
        switchTab(tab) {
            this.activeTab = tab;
            window.location.hash = tab;
        }
      }" 
      x-init="
        init();
        setTabFromHash();
        window.addEventListener('hashchange', () => setTabFromHash());
        window.currentPageTransition = $data;
      ">

    <!-- Navigation - outside transition wrapper so it stays static -->
    @include('components.user-nav')
    
    <!-- Loading overlay -->
    <div x-show="isLoading" 
         x-transition:enter="transition ease-out duration-600"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-600"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-bg-dark flex items-center justify-center z-50">
    </div>

    <!-- Main content wrapper -->
    <div x-cloak
         x-show="!isLoading" 
         x-transition:enter="transition ease-in duration-600"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-out duration-600"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="w-full flex flex-col justify-center items-center">

    <section class="mt-24 md:w-[80%] w-[90%]">
        <!-- TODO: add breadcrumb logic -->
        <!-- Breadcrumbs -->
        <div class="flex md:flex-col sm:flex-col flex-col lg:flex-row gap-4 lg:justify-between align-middle">
          <ul class="text-white/40 flex gap-2">
             <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100"">
                <a href="#" @click.prevent="navigateTo('/learn')">Learn</a>
             </li>
             <li class="!text-white/40">></li>
             <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">
                <a href="#" @click.prevent="navigateTo('{{ route('learn.course', ['slug' => $course->slug]) }}')"> {{ $course->course_name }} </a>
             </li>
             <li class="!text-white/40">></li>
            <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">
                <a href="#" @click.prevent="navigateTo('{{ route('learn.course', ['slug' => $course->slug]) }}')"> {{ $lessonName }} </a>
            </li>
             <li class="!text-white/40">></li>
             <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">Video</li>
          </ul>
    </div>
        
        <!-- Course Title -->
        <h1 class="text-text-primary font-semibold lg:text-title md:text-4xl sm:text-4xl mt-4 "> {{$lessonName}} </h1>
        <p class="text-white/70 text-lg mt-4"> </p>

        <!-- Lesson Progress -->

        <div class="bg-bg-card bg-opacity-10 w-100 rounded-lg">
            <ul class="flex text-center">
                <!-- TODO: Add logic to track which lessons are active -->
                <li class="cursor-pointer hover:bg-bg-card hover:bg-opacity-50 transition-all duration-600 flex-1 py-3 text-center border border-white/20 rounded-l-lg" 
                    :class="{'bg-bg-card bg-opacity-30': activeTab === 'video'}"
                    @click="switchTab('video')" id="video-button">Video</li>
                <li class="cursor-pointer hover:bg-bg-card hover:bg-opacity-50 transition-all duration-600 flex-1 py-3 text-center border border-white/20" 
                    :class="{'bg-bg-card bg-opacity-30': activeTab === 'notes'}"
                    @click="switchTab('notes')" id="notes-button">Notes</li>
                <li class="cursor-pointer hover:bg-bg-card hover:bg-opacity-50 transition-all duration-600 flex-1 py-3 text-center border border-white/20 rounded-r-lg" 
                    :class="{'bg-bg-card bg-opacity-30': activeTab === 'quiz'}"
                    @click="switchTab('quiz')" id="quiz-button">Quiz</li>
            </ul>
        </div>

    </section>

    <main class="container mt-6 mb-12 md:w-[80%] w-[90%]">
        {{ $slot }}
        <!-- User Controls -->
        <div class="flex justify-between w-full mt-12">
        <div class="flex gap-3">
            <!-- TODO: Add logic to track lesson progress -->
            <p class="bg-red-800 bg-opacity-50 p-2 px-4 rounded-full">Belum Selesai</p>
            <button class="text-white/50 hover:text-white/80 transition-all ease-in-out duration-100" 
                    @click="markAsComplete()">Tandai sebagai selesai</button>
        </div>
        <div class="bg-red-800 p-2 px-4 rounded-full flex items-center justify-center gap-2 cursor-pointer hover:bg-opacity-80 transition-all duration-600" 
             @click="navigateToNext()">
            <p>Selanjutnya</p>
            <svg xmlns="http://www.w3.org/2000/svg" 
                class="size-5 fill-white"
                viewBox="0 0 640 640">
                <!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/>
            </svg>
        </div>
    </div>
    </main>
    
    </div> <!-- Close main content wrapper -->

    <script>
        function pageTransition() {
            return {
                isLoading: true, // Start with loading state
                
                init() {
                    // Set up CSRF token for all AJAX requests
                    const token = document.querySelector('meta[name="csrf-token"]');
                    if (token) {
                        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.getAttribute('content');
                    }
                    
                    // Trigger fade-in after page loads
                    setTimeout(() => {
                        this.isLoading = false;
                    }, 150); // Delay to show loading state and create fade effect
                },
                
                async navigateTo(url) {
                    // Start fade out
                    this.isLoading = true;
                    
                    try {
                        // Delay to show the fade effect
                        await new Promise(resolve => setTimeout(resolve, 600));
                        
                        // Navigate to the URL
                        window.location.href = url;
                        
                    } catch (error) {
                        console.error('Navigation error:', error);
                        this.isLoading = false;
                        
                        // Fallback to regular navigation
                        window.location.href = url;
                    }
                },
                
                async navigateToNext() {
                    // TODO: Implement logic to determine next lesson
                    // For now, navigate back to course page
                    await this.navigateTo('/learn');
                },
                
                async markAsComplete() {
                    // Start fade out animation
                    this.isLoading = true;
                    
                    try {
                        // TODO: Add AJAX call to mark lesson as complete
                        // For now, just show the animation
                        await new Promise(resolve => setTimeout(resolve, 600));
                        
                        // Here you can add logic to update the lesson status
                        // e.g., make an AJAX call to update the database
                        
                        // Reset loading state
                        this.isLoading = false;
                        
                    } catch (error) {
                        console.error('Mark as complete error:', error);
                        this.isLoading = false;
                    }
                }
            }
        }



        
    </script>
</body>
</html>