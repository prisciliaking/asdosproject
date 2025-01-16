<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <x-navigation></x-navigation>
    <main>
        <!-- Main Content -->
        <div class="mx-auto p-6">
            <!-- Header -->
            <h1 class="mb-4 text-2xl font-bold">Classes</h1>
            <!-- Dropdown: Default placeholder with no selection -->
            <select id="semesterFilter" class="border border-gray-300 rounded py-2 px-3 w-64 text-black">
                <option value="">Semester</option>
                <option value="ganjil">Semester Ganjil</option>
                <option value="genap">Semester Genap</option>
            </select>
        </div>

        <!-- Course Grid -->
        <div id="courseGrid"
            class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-10 gap-x-4 text-gray-700 text-center font-medium">
            @foreach ($courses as $course)
                <div class="p-10 course-card bg-orange-100 rounded-lg shadow-md"
                    data-semester="{{ $course->kelas_semester }}">
                    <a href="{{ route('registeredAsdos', ['mata_kuliah_id' => $course->matkul_id]) }}" class="block">
                    <h3 class="text-lg font-bold">{{ $course->kelas_name }}</h3>
                    <p>Day: {{ $course->mata_kuliah_hari }}</p>
                    <p>Time: {{ $course->mata_kuliah_jam }}</p>
                    <p>Lecturer: {{ $course->dosen->dosen_name ?? 'N/A' }}</p>
                    <p>Group Link: <a href="{{ $course->whats_app_link }}" target="_blank"
                            class="text-blue-500 underline">Join Group</a></p>

                    <div class="mt-4 flex justify-center space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('courses.edit', $course->kelas_id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('courses.destroy', $course->kelas_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </a>
                </div>

                {{-- <a href="{{ route('registeredAsdos', ['mata_kuliah_id' => $course->matkul_id]) }}" class="block">
                    <h3 class="text-lg font-bold text-gray-900">{{ $course->kelas_name ?? 'N/A' }}</h3>
                    <p class="text-gray-800">Day: {{ $course->mata_kuliah_hari ?? 'N/A' }}</p>
                    <p class="text-gray-800">Time: {{ $course->mata_kuliah_jam ?? 'N/A' }}</p>
                    <p class="text-gray-800">Lecturer: {{ $course->dosen->dosen_name ?? 'N/A' }}</p>
    
                    <!-- Flexbox Container -->
                    <div class="flex items-center justify-center mt-2 space-x-1">
                        <span class="text-gray-800 font-medium">Group Link:</span>
                        <a class="text-blue-500 underline" href="{{ $course->whats_app_link ?? 'N/A' }}" target="_blank">
                            Join Group
                        </a>
                    </div>
                </a> --}}
            @endforeach
        </div>
        </div>

        <!-- Floating Button -->
        <button onclick="location.href='/addcourse'"
            class="fixed bottom-10 right-10 bg-orange-300 hover:bg-orange-400 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
            <p class="text-2xl text-center">+</p>
        </button>
    </main>
    <script>
        document.getElementById('semesterFilter').addEventListener('change', function() {
            const selectedSemester = this.value;
            const courses = document.querySelectorAll('.course-card');

            courses.forEach(course => {
                const courseSemester = course.getAttribute('data-semester');

                if (selectedSemester === 'ganjil, genap' || selectedSemester === '') {
                    course.style.display = 'block'; // Show all courses
                } else if (courseSemester === selectedSemester) {
                    course.style.display = 'block'; // Show matching courses
                } else {
                    course.style.display = 'none'; // Hide non-matching courses
                }
            });
        });
    </script>
</body>
<x-footer></x-footer>
</html>

