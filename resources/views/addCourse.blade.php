<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Class</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <x-navigation></x-navigation>
    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Add New Class</h1>
            <form action="{{ route('addCourse') }}" method="POST">
                @csrf
                <!-- Mata Kuliah Dropdown -->
                {{-- <div class="mb-4">
                    <label for="matkul_id" class="block text-gray-700 font-semibold mb-2">Select Course</label>
                    <select name="matkul_id" id="matkul_id"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                        <option value="">-- Select a Course --</option>
                        @foreach ($mataKuliahs as $matkul)
                            <option value="{{ $matkul->matkul_id }}">{{ $matkul->matkul_name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <!-- Class Name -->
                <div class="mb-4">
                    <label for="kelas_name" class="block text-gray-700 font-semibold mb-2">Class Name</label>
                    <input type="text" name="kelas_name" id="kelas_name" placeholder="Class Name"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>


                <div class="mb-4">
                    <label for="dosen_id" class="block text-gray-700 font-semibold mb-2">Select Lecturer</label>
                    <select name="dosen_id" id="dosen_id"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                        <option value="">-- Select a Lecturer --</option>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->dosen_id }}">{{ $dosen->dosen_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Semester -->
                <div class="mb-4">
                    <label for="kelas_semester" class="block text-gray-700 font-semibold mb-2">Semester</label>
                    <input type="text" name="kelas_semester" id="kelas_semester" placeholder="e.g., ganjil"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>
                <!-- Day -->
                <div class="mb-4">
                    <label for="mata_kuliah_hari" class="block text-gray-700 font-semibold mb-2">Day</label>
                    <input type="text" name="mata_kuliah_hari" id="mata_kuliah_hari" placeholder="e.g., Monday"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- Time -->
                <div class="mb-4">
                    <label for="mata_kuliah_jam" class="block text-gray-700 font-semibold mb-2">Time</label>
                    <input type="text" name="mata_kuliah_jam" id="mata_kuliah_jam" placeholder="e.g., 10:00 - 12:00"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- WhatsApp Link -->
                <div class="mb-4">
                    <label for="whats_app_link" class="block text-gray-700 font-semibold mb-2">WhatsApp Group
                        Link</label>
                    <input type="text" name="whats_app_link" id="whats_app_link"
                        placeholder="e.g., https://chat.whatsapp.com/..."
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-orange-400 text-white font-bold py-3 rounded hover:bg-orange-500">
                    Create Kelas Mata Kuliah
                </button>
            </form>
            </form>
        </div>
    </div>
</body>

</html>
