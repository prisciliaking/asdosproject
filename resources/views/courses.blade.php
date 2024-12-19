<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navigation></x-navigation>
    <main>
        <!-- Main Content -->
        <div class="mx-auto p-6">
            <!-- Header -->
                <h1 class="mb-4 text-2xl font-bold">Courses</h1>
                <!-- Dropdown: Default placeholder with no selection -->
                <select id="semesterFilter" class="border border-gray-300 rounded py-2 px-3 w-64 text-black">
                    <option selected disabled>Semester</option>
                    <option value="ganjil">Semester Ganjil</option>
                    <option value="genap">Semester Genap</option>
                </select>
            </div>

            <!-- Course Grid -->
            <div id="courseGrid" class="p-6 grid grid-cols-3 gap-y-10 gap-x-4 text-gray-700 text-center font-medium">
                @foreach ($courses as $course)
                    <div class="p-10 course-card bg-orange-100 rounded-lg shadow-md" data-semester="{{ $course->kelas_semester }}">
                        <h3 class="text-lg font-bold">{{ $course->kelas_nama }}</h3>
                        <p>Day: {{ $course->mata_kuliah_hari }}</p>
                        <p>Time: {{ $course->mata_kuliah_jam }}</p>
                        <p>Lecturer: {{ $course->mataKuliahDosen->dosen->dosen_name ?? 'N/A' }}</p>
                        <p>Group Link: <a href="{{ $course->whats_app_link }}" target="_blank" class="text-blue-500 underline">Join Group</a></p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Floating Button -->
        {{-- <button onclick="location.href='/addcourse'"
            class="fixed bottom-10 right-10 bg-orange-300 hover:bg-orange-400 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
            <p class="text-2xl text-center">+</p>
        </button> --}}
    </main>

    <script>
        document.getElementById('semesterFilter').addEventListener('change', function () {
            const selectedSemester = this.value;
            const courses = document.querySelectorAll('.course-card');

            courses.forEach(course => {
                // Get the semester of the course from the data attribute
                const courseSemester = course.getAttribute('data-semester');

                // Show or hide the course based on the selected semester
                if (courseSemester === selectedSemester) {
                    course.style.display = 'block';
                } else {
                    course.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>

{{-- <main class="p-6">
    <!-- MataKuliah List -->
    <h2 class="text-2xl font-semibold mb-4">MataKuliah List</h2>
    <!-- Main Content -->
    <div class="mx-auto p-6">
        <!-- Header -->
        <h2 class="text-2xl font-semibold mb-2">Course(s):</h2>
        <!-- Dropdown: Default placeholder with no selection -->
        <select id="semesterFilter" class="border border-gray-300 rounded py-2 px-3 w-64 text-black">
            <option selected disabled>Semester</option>
            <option value="ganjil">Semester Ganjil</option>
            <option value="genap">Semester Genap</option>
        </select>
    </div>
    <!-- Main Content -->
    <div class="mx-auto p-6">
        <!-- MataKuliah List -->
        <div id="courseGrid"
            class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-10 gap-x-4 text-gray-700 text-center font-medium">
            @foreach ($mataKuliahs as $mataKuliah)
                <div
                    class="p-10 course-card bg-orange-100 rounded-lg shadow-md transform transition-transform duration-300 hover:scale-105">
                    <a href="{{ route('courses.details', ['mata_kuliah_id' => $mataKuliah->mata_kuliah_id]) }}"
                        class="block w-full text-left focus:outline-none">
                        <h3 class="text-lg font-bold text-gray-900">{{ $mataKuliah->mata_kuliah_nama ?? 'N/A' }}
                        </h3>
                        <p class="text-gray-800 mt-2">Click to view details</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</main> --}}