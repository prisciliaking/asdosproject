<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Asdos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <x-navigation></x-navigation>
    <div class="container mx-auto mt-10">
        <div class="bg-white p-8 rounded-lg shadow-xl border-t-8 border-orange-400">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Asdos Registration</h1>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4 shadow-md">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Registration Form -->
            <form action="{{ route('registrasiAsdos.store') }}" method="POST">
                @csrf
                <!-- Choose Courses -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($mataKuliah as $matkul)
                        <div class="flex items-center space-x-3 bg-orange-100 p-4 rounded-lg shadow-sm checkbox-container transition duration-300 hover:bg-orange-200">
                            <input type="checkbox" name="matkul_ids[]" value="{{ $matkul->matkul_id }}"
                                id="matkul_{{ $matkul->matkul_id }}" class="h-5 w-5 text-orange-500 rounded" 
                                onclick="toggleSelection(this)">
                            <label for="matkul_{{ $matkul->matkul_id }}" class="text-gray-800 font-medium">{{ $matkul->matkul_name }}</label>
                        </div>
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-8"> <!-- Added margin-top here -->
                    <button type="submit"
                        class="w-full md:w-1/2 bg-orange-400 text-white font-bold py-3 rounded-lg hover:bg-orange-500 transition duration-300 transform hover:scale-105">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
<x-footer></x-footer>


</html>