<!-- approvedDetail.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accepted Students for {{ $course->kelas_nama }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navigation></x-navigation>
    
    <main>
        <div class="mx-auto p-6">
            <h2 class="text-2xl font-semibold mb-4 ">Accepted Students for {{ $course->kelas_nama }}</h2>

            <!-- Students Table -->
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-orange-100">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Student Name</th>
                        <th class="border px-4 py-2">Student NIM</th>
                        <th class="border px-4 py-2">Student Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acceptedStudents as $index => $acceptance)
                        <tr>
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $acceptance->user->user_name }}</td>
                            <td class="border px-4 py-2">{{ $acceptance->user->user_nim }}</td>
                            <td class="border px-4 py-2">{{ $acceptance->user->user_email}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <x-footer></x-footer>
</body>
</html>
