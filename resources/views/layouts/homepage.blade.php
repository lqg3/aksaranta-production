<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aksaranta</title>
    <script>
        (function() {
            try {
                var stored = localStorage.getItem('theme');
                var useDark = stored ? (stored === 'dark') : true; // default dark
                if (!stored) {
                    localStorage.setItem('theme', 'dark');
                }
                document.documentElement.classList.toggle('dark', useDark);
                document.documentElement.classList.toggle('light', !useDark);
            } catch (e) {}
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-app text-app font-sans antialiased overflow-hidden flex justify-center min-h-screen">
@include('components.user-nav')
    @yield('content')
    <!-- Theme toast -->
    <div id="theme-toast" class="fixed bottom-6 left-1/2 -translate-x-1/2 px-4 py-2 rounded-lg bg-black/80 text-white text-sm opacity-0 translate-y-2 transition-all duration-300 pointer-events-none z-[10000]"></div>
</body>
</html>