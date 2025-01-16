<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approve</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <x-navigation></x-navigation>
    <main>
        <!-- Main Content -->
        <div class="mx-auto p-6">
            <h1 class="mb-4 text-2xl font-bold">Approved ASDOS</h1>
            
            <!-- Check if there are any assignments -->
            @if($asdosAssignments->isEmpty())
                <p>No approved ASDOS found for open courses.</p>
            @else
                <div id="courseGrid"
                    class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-10 gap-x-4 text-gray-700 text-center font-medium">
                    @foreach ($asdosAssignments as $assignment)
                        <div class="p-10 course-card bg-orange-100 rounded-lg shadow-md transform transition-transform duration-300 hover:scale-105"
                            data-semester="{{ $assignment->kelasMatakuliah->semester }}">
                            <a href="{{ route('approvedDetail', ['kelasId' => $assignment->kelasMatakuliah->kelas_id]) }}"
                                class="block">
                                <h3 class="text-lg font-bold text-gray-900">
                                    {{ $assignment->kelasMatakuliah->kelas_name ?? 'N/A' }}</h3>
                                <p class="text-gray-800">Day: {{ $assignment->kelasMatakuliah->mata_kuliah_hari ?? 'N/A' }}</p>
                                <p class="text-gray-800">Time: {{ $assignment->kelasMatakuliah->mata_kuliah_jam ?? 'N/A' }}</p>
                                <p class="text-gray-800">Lecturer:
                                    {{ $assignment->kelasMatakuliah->dosen->dosen_name ?? 'N/A' }}</p>

                                <!-- Flexbox Container -->
                                <div class="flex items-center justify-center mt-2 space-x-1">
                                    <span class="text-gray-800 font-medium">Group Link:</span>
                                    <a class="text-blue-500 underline"
                                        href="{{ $assignment->kelasMatakuliah->whats_app_link ?? 'N/A' }}"
                                        target="_blank">Join Group</a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </main>
</body>
<x-footer></x-footer>
</html>
    