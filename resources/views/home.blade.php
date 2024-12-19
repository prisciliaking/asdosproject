<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Include Vite assets -->
</head>

<body class="bg-gray-100">
    <!-- Navigation -->
    <x-navigation></x-navigation>

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-4xl font-bold text-orange-600 mb-4">Welcome to Asdos Dashboard!</h1>
        <p class="text-gray-700 text-lg">Manage your courses, classes, and schedules efficiently.</p>
        {{-- <a href="{{ route('courses.index') }}" class="mt-6 px-6 py-3 bg-orange-500 text-white rounded-md hover:bg-orange-600">
            Get Started
        </a> --}}
    </main>
    <x-footer></x-footer>
</body>
</html>
