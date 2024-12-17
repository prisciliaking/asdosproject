<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approve</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navigationAdmin></x-navigationAdmin>
    <main>
        <!-- Main Content -->
        <div class="mx-auto p-6">

            <div id="courseGrid"
            class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-10 gap-x-4 text-gray-700 text-center font-medium">
            @foreach ($courses as $course)
                <div class="p-10 course-card bg-orange-100 rounded-lg shadow-md transform transition-transform duration-300 hover:scale-105"
                    data-semester="{{ $course->kelas_semester }}">
                    <a href="{{ route('course.details', ['id' => $course->kelas_id]) }}" class="block">
                        <h3 class="text-lg font-bold text-gray-900">{{ $course->kelas_nama }}</h3>
                        <p class="text-gray-800">Day: {{ $course->mata_kuliah_hari }}</p>
                        <p class="text-gray-800">Time: {{ $course->mata_kuliah_jam }}</p>
                        <p class="text-gray-800">Lecturer:
                            {{ $course->mataKuliahDosen->dosen->dosen_name ?? 'N/A' }}</p>
        
                        <!-- Flexbox Container -->
                        <div class="flex items-center justify-center mt-2 space-x-1">
                            <span class="text-gray-800 font-medium">Group Link:</span>
                            <a class="text-blue-500 underline" href="{{ $course->whats_app_link }}"
                                target="_blank">Join Group</a>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
    </main>

</body>

</html>
