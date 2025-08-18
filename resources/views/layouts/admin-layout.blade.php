<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Aplikasi Aksara')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        @vite('resources/css/app.css')
        @yield('head-scripts')
    </head>

    <body class="flex bg-app text-app font-opensans">
        @include('components.admin-sidebar')
        
        <main class="sm:ml-72 mt-8 sm:mt-0 p-4 w-full">
            @yield('content')
        </main>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        @stack('scripts')
    </body>
</html>
