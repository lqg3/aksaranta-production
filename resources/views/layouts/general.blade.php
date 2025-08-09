<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aksaranta')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
</head>

<body class="@yield('body-class', 'bg-bg-dark')" 
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
         class="fixed inset-0 bg-bg-dark flex items-center justify-center z-50">
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
         class="@yield('content-class', 'w-full')">

        @yield('content')
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
    @yield('scripts')
</body>

<!-- Footer -->
    @include('components.footer')
</html>