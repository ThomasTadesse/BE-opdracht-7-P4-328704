<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazijn Jamin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body class="h-full">
    <div class="h-full flex flex-col">
        <main class="flex-1 p-4">
            {{ $slot }}
        </main>
        <footer class="bg-gray-800 text-white p-4">
            <p>&copy; {{ date('Y') }}</p>
        </footer>
    </div>
</body>
</html>