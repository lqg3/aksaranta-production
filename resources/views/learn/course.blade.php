<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->course_name }} - Aksaranta</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-bg-dark flex flex-col justify-center items-center" 
      x-data="pageTransition()" 
      x-init="init()">
    
    <!-- Loading overlay -->
    <div x-cloak
         x-show="isLoading" 
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
        
        <!-- Header Section -->
        <section class="mt-24 mb-12 md:w-[80%] w-[90%]">
            <!-- Breadcrumbs -->
            <ul class="text-white/40 flex gap-2">
                <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">
                    <a href="#" @click.prevent="navigateTo('/learn')">Learn</a>
                </li>
                <li class="!text-white/40">></li>
                <li class="hover:text-white/80 cursor-pointer transition-all ease-in-out-100 duration-100">{{ $course->course_name }}</li>
            </ul>

            <!-- Course Title -->
            <h1 class="text-text-primary font-semibold text-title mt-4">{{ $course->course_name }}</h1>
            <p class="text-white/70 text-lg mt-4">{{ $course->instructor ?? '' }}</p>

            <div class="flex justify-between border border-red-800 border-opacity-30 rounded-lg mt-4 p-3 w-full align-center">
                <h2 class="text-text-primary font-semibold my-auto">Lanjutkan Course</h2>
                <a class="text-text-primary cursor-pointer hover:bg-opacity-80 bg-red-800 p-2 px-4 font-semibold transition-all ease-in-out-100 duration-100">Progress Terakhir</a>
            </div>

            <!-- TODO: create logic to fetch last user progress -->

            <!-- Course Description -->
            <p class="text-text-primary text-md mt-4">{{ $course->course_description }}</p>
        </section>

        <!-- Courses Section -->
        <section class="mb-12 md:w-[80%] w-[90%]">

        @php
            // Sort the lessons available in the course
            $sortedLessons = collect($lessons["lesson"])->sortBy('order')->all();
            $lessons["lesson"] = $sortedLessons;
        @endphp

        <div class="flex flex-col gap-4" x-data="{ selectedAccordionItem: null }">
        @foreach ($lessons["lesson"] as $index => $lesson)
            <div>
                <button id="controlsAccordionItem{{ $index }}" type="button" class="flex w-full items-center justify-between gap-4 p-4 text-left text-text-primary rounded-lg bg-bg-card bg-opacity-10 hover:bg-bg-card hover:bg-opacity-5 transition-all duration-100 ease-in-out border border-white/20" aria-controls="accordionItem{{ $index }}" x-on:click="selectedAccordionItem = selectedAccordionItem === {{ $index }} ? null : {{ $index }}" x-bind:class="selectedAccordionItem === {{ $index }} ? 'text-white font-bold bg-gray-700' : 'text-gray-300 font-medium'" x-bind:aria-expanded="selectedAccordionItem === {{ $index }} ? 'true' : 'false'">
                    {{ $lesson->lesson_name }}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true" x-bind:class="selectedAccordionItem === {{ $index }} ? 'rotate-180' : ''">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div x-cloak x-show="selectedAccordionItem === {{ $index }}" id="accordionItem{{ $index }}" role="region" aria-labelledby="controlsAccordionItem{{ $index }}" x-collapse>
                    <div class="p-4 text-sm sm:text-base text-text-primary rounded-b-lg bg-bg-card bg-opacity-10">
                        @foreach ($lesson_parts as $lesson_part)
                            @if ($lesson_part->lesson_id === $lesson->id)
                            <div class="bg-bg-card bg-opacity-20 hover:bg-opacity-10 p-4 flex justify-between mb-1 rounded-md cursor-pointer transition-all duration-150" 
                                 @click="navigateTo('/learn/{{ $slug }}/{{ $lesson->lesson_name }}')">
                                <div class="flex items-center my-auto gap-4 cursor-pointer">
                                    <!-- Checklist icon placeholder -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-white" viewBox="0 0 512 512"><path d="M464 256a208 208 0 1 0 -416 0 208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0 256 256 0 1 1 -512 0z"/></svg>
                                    <p>{{ $lesson_part->part_name ?? 'Lesson Part' }}</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-white" viewBox="0 0 640 640"><path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/></svg>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>   
            </div>
        @endforeach
        </div>        
        </section>
    </div>

    <script>
        function pageTransition() {
            return {
                isLoading: true,
                
                init() {
                    // Set up CSRF token for all AJAX requests
                    const token = document.querySelector('meta[name="csrf-token"]');
                    if (token) {
                        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.getAttribute('content');
                    }
                    
                    // Trigger fade-in effect after a short delay
                    setTimeout(() => {
                        this.isLoading = false;
                    }, 300);
                },
                
                async navigateTo(url) {
                    // Start fade out
                    this.isLoading = true;
                    
                    try {
                        // Small delay to show the fade effect
                        await new Promise(resolve => setTimeout(resolve, 300));
                        
                        // For now, use regular navigation
                        // In the future, you can implement AJAX loading here
                        window.location.href = url;
                        
                    } catch (error) {
                        console.error('Navigation error:', error);
                        this.isLoading = false;
                        
                        // Fallback to regular navigation
                        window.location.href = url;
                    }
                }
            }

            
        }
    </script>
</body>

</html>