<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Class</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <x-navigation></x-navigation>
    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Add New Class</h1>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('addCourse1') }}" method="POST">
                @csrf
                <!-- Mata Kuliah Dropdown -->
                <div class="mb-4">
                    <label for="matkul_id" class="block text-gray-700 font-semibold mb-2">Select Course</label>
                    <select name="matkul_id" id="matkul_id" required
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                        <option value="">-- Select a Course --</option>
                        @foreach ($mataKuliahs as $matkul)
                            <option value="{{ $matkul->matkul_id }}"
                                {{ old('matkul_id') == $matkul->matkul_id ? 'selected' : '' }}>
                                {{ $matkul->matkul_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('matkul_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>



                <!-- Class Name -->
                <div class="mb-4">
                    <label for="kelas_name" class="block text-gray-700 font-semibold mb-2">Class Name</label>
                    <input type="text" name="kelas_name" id="kelas_name" value="{{ old('kelas_name') }}"
                        placeholder="Class Name"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- Dosen Dropdown -->
                <div class="mb-4">
                    <label for="dosen_id" class="block text-gray-700 font-semibold mb-2">Select Lecturer</label>
                    <select name="dosen_id" id="dosen_id" required
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                        <option value="">-- Select a Lecturer --</option>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->dosen_id }}"
                                {{ old('dosen_id') == $dosen->dosen_id ? 'selected' : '' }}>
                                {{ $dosen->dosen_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('dosen_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Semester -->
                <div class="mb-4">
                    <label for="kelas_semester" class="block text-gray-700 font-semibold mb-2">Semester</label>
                    <select name="kelas_semester" id="kelas_semester" required
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                        <option value="">-- Select Semester --</option>
                        <option value="ganjil" {{ old('kelas_semester') == 'ganjil' ? 'selected' : '' }}>Ganjil
                        </option>
                        <option value="genap" {{ old('kelas_semester') == 'genap' ? 'selected' : '' }}>Genap</option>
                    </select>
                    @error('kelas_semester')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Day -->
                <div class="mb-4">
                    <label for="mata_kuliah_hari" class="block text-gray-700 font-semibold mb-2">Day</label>
                    <select name="mata_kuliah_hari" id="mata_kuliah_hari" required
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                        <option value="">-- Select Day --</option>
                        <option value="Monday" {{ old('mata_kuliah_hari') == 'Monday' ? 'selected' : '' }}>Monday
                        </option>
                        <option value="Tuesday" {{ old('mata_kuliah_hari') == 'Tuesday' ? 'selected' : '' }}>Tuesday
                        </option>
                        <option value="Wednesday" {{ old('mata_kuliah_hari') == 'Wednesday' ? 'selected' : '' }}>
                            Wednesday</option>
                        <option value="Thursday" {{ old('mata_kuliah_hari') == 'Thursday' ? 'selected' : '' }}>Thursday
                        </option>
                        <option value="Friday" {{ old('mata_kuliah_hari') == 'Friday' ? 'selected' : '' }}>Friday
                        </option>
                    </select>
                    @error('mata_kuliah_hari')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Time -->
                <div class="mb-4">
                    <label for="mata_kuliah_jam" class="block text-gray-700 font-semibold mb-2">Time</label>
                    <input type="text" name="mata_kuliah_jam" id="mata_kuliah_jam"
                        value="{{ old('mata_kuliah_jam') }}" placeholder="e.g., 10:00 - 12:00"
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- WhatsApp Link -->
                <div class="mb-4">
                    <label for="whats_app_link" class="block text-gray-700 font-semibold mb-2">WhatsApp Group
                        Link</label>
                    <input type="text" name="whats_app_link" id="whats_app_link" value="{{ old('whats_app_link') }}"
                        placeholder="e.g., https://chat.whatsapp.com/..."
                        class="w-full p-3 rounded bg-gray-50 border focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-orange-400 text-white font-bold py-3 rounded hover:bg-orange-500">
                    Create Kelas Mata Kuliah
                </button>
            </form>
        </div>
    </div>
</body>
<x-footer></x-footer>
</html>
