<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <x-navigation></x-navigation>
    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Manage Mata Kuliah</h1>

            <!-- Display Errors -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Create Mata Kuliah Form -->
            <form action="{{ route('matakuliah.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="matkul_name" class="block text-gray-700 font-semibold mb-2">Mata Kuliah Name</label>
                    <input type="text" name="matkul_name" id="matkul_name" value="{{ old('matkul_name') }}"
                        placeholder="Enter Mata Kuliah Name"
                        class="w-full p-3 rounded bg-gray-50 border focus:ring-2 focus:ring-orange-300">
                </div>
                <div class="mb-4">
                    <label for="isOpen" class="block text-gray-700 font-semibold mb-2">Is Open</label>
                    <select name="isOpen" id="isOpen"
                        class="w-full p-3 rounded bg-gray-50 border focus:ring-2 focus:ring-orange-300">
                        <option value="1" {{ old('isOpen') == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('isOpen') == '0' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <button type="submit" class="bg-orange-500 text-white font-bold py-2 px-4 rounded hover:bg-orange-300">
                    Create Mata Kuliah
                </button>
            </form>

            <h2 class="text-xl font-bold mt-10 mb-4">Mata Kuliah</h2>
            <table class="min-w-full bg-white border-collapse rounded-lg shadow-md">
                <thead>
                    <tr class="bg-orange-100">
                        <th class="px-4 py-2 text-center">No</th>
                        <th class="px-4 py-2 text-center">Name</th>
                        <th class="px-4 py-2 text-center">Is Open</th>
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mataKuliahs as $mataKuliah)
                        <tr class="text-center" id="mataKuliah-{{ $mataKuliah->matkul_id }}">
                            <td class="border px-4 py-2 align-middle">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 align-middle">{{ $mataKuliah->matkul_name }}</td>
                            <td class="border px-4 py-2 align-middle" id="isOpen-{{ $mataKuliah->matkul_id }}">
                                {{ $mataKuliah->isOpen ? 'Yes' : 'No' }}
                            </td>
                            <td class="border px-4 py-2 align-middle">
                                <button
                                    class="px-4 py-1 bg-orange-500 text-black rounded hover:bg-orange-300 edit-isOpen"
                                    data-id="{{ $mataKuliah->matkul_id }}" data-isopen="{{ $mataKuliah->isOpen }}">
                                    Edit Is Open
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</body>

<x-footer></x-footer>
</html>

<script>
    document.querySelectorAll('.edit-isOpen').forEach(item => {
        item.addEventListener('click', function() {
            var mataKuliahId = this.getAttribute('data-id');
            var currentIsOpen = this.getAttribute('data-isopen') === '1';

            // Toggle the isOpen value
            var newIsOpen = currentIsOpen ? 0 : 1;

            // Send AJAX request to update the isOpen field
            fetch(`/mataKuliah/${mataKuliahId}/updateIsOpen`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Ensure CSRF protection
                    },
                    body: JSON.stringify({
                        isOpen: newIsOpen
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the DOM (table) with the new value
                        var isOpenCell = document.getElementById('isOpen-' + mataKuliahId);
                        isOpenCell.textContent = newIsOpen ? 'Yes' : 'No';

                        // Optionally, change the button's state
                        this.setAttribute('data-isopen', newIsOpen);
                        this.textContent = newIsOpen ? 'Edit' : 'Edit';
                    } else {
                        alert('Failed to update Mata Kuliah.');
                    }
                })
                .catch(error => {
                    alert('Error: ' + error);
                });
        });
    });
</script>
