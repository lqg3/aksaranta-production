<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Aksaranta') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-app text-app" 
          x-data="pageTransition()" 
          x-init="init(); window.currentPageTransition = $data">
        
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
             class="fixed inset-0 bg-app flex items-center justify-center z-50">
        </div>

        <!-- Main content wrapper - only content inside transitions -->
        <div x-cloak
             x-show="!isLoading" 
             x-transition:enter="transition ease-in duration-600"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-out duration-600"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="min-h-screen flex flex-col justify-center items-center gap-4 py-10 sm:py-12 px-4 bg-app">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-white text-gray-500" />
                </a>
            </div>

            <div class="w-full max-w-md px-6 py-6 bg-app border border-red-800 border-opacity-30 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
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
        <!-- Theme toast -->
        <div id="theme-toast" class="fixed bottom-6 left-1/2 -translate-x-1/2 px-4 py-2 rounded-lg bg-black/80 text-white text-sm opacity-0 translate-y-2 transition-all duration-300 pointer-events-none z-[10000]"></div>
    </body>
</html>
