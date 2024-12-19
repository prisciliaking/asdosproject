<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admins List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-navigation></x-navigation>
    <div class="container mx-auto p-4 mt-5">
        <h1 class="mb-4 text-2xl font-bold">Admins List</h1>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-orange-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">NIM</th>
                    <th class="border border-gray-300 px-4 py-2">Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user ->user_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user ->user_email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user ->user_nim }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user ->role->role_name ?? 'Admin' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">No admins found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
