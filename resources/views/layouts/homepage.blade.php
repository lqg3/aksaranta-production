<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aksaranta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bg-dark text-text-primary font-sans antialiased overflow-hidden flex items-center justify-center min-h-screen">
@include('components.user-nav')
    @yield('content')
</body>
</html>