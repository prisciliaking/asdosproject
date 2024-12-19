<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accepted Courses</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navigation></x-navigation>

    <main class="p-6">
        <div class="container">
            <h1 class="mb-4 text-2xl font-bold">Accepted Courses for {{ $user->user_name }}</h1>
            @if ($acceptedCourses->isEmpty())
                <p class="text-gray-700">You have not been accepted into any courses yet.</p>
            @else
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-orange-100">
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Course Name</th>
                            <th class="border px-4 py-2">Lecturer's Name</th>
                            <th class="border px-4 py-2">Day</th>
                            <th class="border px-4 py-2">Time</th>
                            <th class="border px-4 py-2">Group Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acceptedCourses as $index => $course)
                            <tr>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">
                                    {{ $course->mataKuliah->kelas_nama ?? 'N/A' }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ $course->mataKuliah->mataKuliahDosen->dosen->dosen_name ?? 'N/A' }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ $course->mataKuliah->mata_kuliah_hari ?? 'N/A' }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ $course->mataKuliah->mata_kuliah_jam ?? 'N/A' }}
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ $course->mataKuliah->whats_app_link ?? '#' }}" target="_blank"
                                        class="text-blue-500 underline">
                                        Join Group
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        </tbody>
        </table>
    </main>
    <x-footer></x-footer>
</body>

</html>
