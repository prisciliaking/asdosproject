<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Class</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <x-navigation></x-navigation>
    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Edit Class</h1>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.update', $courses->kelas_id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Display Non-Editable Course -->
                <div class="mb-4">
                    <label for="matkul_name" class="block text-gray-700 font-semibold mb-2">Course</label>
                    <input type="text" id="matkul_name" value="{{ $courses->mataKuliah->matkul_name }}" disabled
                        class="w-full p-3 rounded bg-gray-50 border">
                    <input type="hidden" name="matkul_id" value="{{ $courses->matkul_id }}">
                </div>

                <!-- Display Non-Editable Lecturer -->
                <div class="mb-4">
                    <label for="dosen_name" class="block text-gray-700 font-semibold mb-2">Lecturer</label>
                    <input type="text" id="dosen_name" value="{{ $courses->dosen->dosen_name }}" disabled
                        class="w-full p-3 rounded bg-gray-50 border">
                    <input type="hidden" name="dosen_id" value="{{ $courses->dosen_id }}">
                </div>

                <!-- Class Name -->
                <div class="mb-4">
                    <label for="kelas_name" class="block text-gray-700 font-semibold mb-2">Class Name</label>
                    <input type="text" name="kelas_name" id="kelas_name" value="{{ old('kelas_name', $courses->kelas_name) }}"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- Semester -->
                <div class="mb-4">
                    <label for="kelas_semester" class="block text-gray-700 font-semibold mb-2">Semester</label>
                    <input type="text" name="kelas_semester" id="kelas_semester"
                        value="{{ old('kelas_semester', $courses->kelas_semester) }}"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- Day -->
                <div class="mb-4">
                    <label for="mata_kuliah_hari" class="block text-gray-700 font-semibold mb-2">Day</label>
                    <input type="text" name="mata_kuliah_hari" id="mata_kuliah_hari"
                        value="{{ old('mata_kuliah_hari', $courses->mata_kuliah_hari) }}"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- Time -->
                <div class="mb-4">
                    <label for="mata_kuliah_jam" class="block text-gray-700 font-semibold mb-2">Time</label>
                    <input type="text" name="mata_kuliah_jam" id="mata_kuliah_jam"
                        value="{{ old('mata_kuliah_jam', $courses->mata_kuliah_jam) }}"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- WhatsApp Link -->
                <div class="mb-4">
                    <label for="whats_app_link" class="block text-gray-700 font-semibold mb-2">WhatsApp Group Link</label>
                    <input type="text" name="whats_app_link" id="whats_app_link"
                        value="{{ old('whats_app_link', $courses->whats_app_link) }}"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-orange-400 text-white font-bold py-3 rounded hover:bg-orange-500">
                    Update Class
                </button>
            </form>
        </div>
    </div>
</body>
<x-footer></x-footer>
</html>
