<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-bg-dark" 
      x-data="pageTransition()" 
      x-init="init()">
    
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
         class="w-full">

        <h1 class="text-text-primary text-title text-center mt-12 mb-12">Courses</h1>
        <!-- Should be a container listing all courses available -->

        <section class="grid gap-4 h-full grid-cols-1 place-items-center w-full">

            @foreach($courseData as $course)
                
                <div class="h-64 lg:w-[700px] md:w-3/4 w-3/4 bg-cover bg-center cursor-pointer overflow-hidden rounded-3xl"
                    style="background-image: url('{{ $course->image_url }}')"
                    @click="navigateTo('/learn/{{ $course->slug }}')">
                    <div>
                    </div>
                    <div class="h-full flex flex-col justify-end p-6 hover:!bg-black/60 group transition-all ease-in-out duration-600"
                        style="background-color: rgba(1, 1, 1, 40%)">
                        <div class="absolute">
                            <h2 class="text-text-primary font-semibold md:text-6xl text-3xl ">{{ $course->course_name }}</h2>
                            <p class="text-text-primary" style="width:85%">{{ \Illuminate\Support\Str::limit($course->course_description, 65) }} </p>
                        </div>
                        <div class="flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="size-5 fill-white opacity-0 group-hover:opacity-100 transition-all duration-600 ease-in-out transform translate-y-8 group-hover:translate-y-0"
                                 viewBox="0 0 640 640">
                                <!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/>
                            </svg>
                        </div>
                    </div>
                </div>

            @endforeach

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