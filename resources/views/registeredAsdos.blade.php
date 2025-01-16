<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registered Asdos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <x-navigation></x-navigation>
    <div class="container mx-auto p-6">
        <!-- Ensure $mataKuliah is passed to the view properly -->
        @isset($mataKuliah)
            <h1 class="text-2xl font-bold mb-6">Asdos Registrations for {{ $mataKuliah->matkul_name }}</h1>
        @else
            <h1 class="text-2xl font-bold mb-6">Asdos Registrations</h1>
        @endisset

        @if ($asdos->isEmpty())
            <p>No asdos registered for this course yet.</p>
        @else
            <form action="{{ route('registrasiAsdos.updateStatus') }}" method="POST">
                @csrf
                @foreach ($asdos as $registrasi)
                    @if ($registrasi->status === 'waiting')
                        <div class="p-4 bg-white rounded shadow mb-4">
                            <p><strong>Name:</strong> {{ $registrasi->user->user_name }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($registrasi->status) }}</p>

                            <!-- Dropdown for status -->
                            <select name="status[{{ $registrasi->registrasi_id }}]"
                                class="bg-gray-100 p-2 rounded status-dropdown"
                                data-registrasi-id="{{ $registrasi->registrasi_id }}"
                                @if ($registrasi->status !== 'waiting') disabled @endif>
                                <option value="waiting" {{ $registrasi->status === 'waiting' ? 'selected' : '' }}>
                                    Waiting
                                </option>
                                <option value="approve" {{ $registrasi->status === 'approve' ? 'selected' : '' }}>
                                    Approved
                                </option>
                                <option value="rejected" {{ $registrasi->status === 'rejected' ? 'selected' : '' }}>
                                    Rejected
                                </option>
                            </select>

                            <!-- Class selection for approved -->
                            <div class="mt-2 class-selection" id="class-selection-{{ $registrasi->registrasi_id }}"
    @if ($registrasi->status !== 'approve' && old("status.{$registrasi->registrasi_id}") !== 'approve') style="display: none;" @endif>
    <label for="kelas_id_{{ $registrasi->registrasi_id }}">Assign to Class:</label>
    <select name="kelas_id[{{ $registrasi->registrasi_id }}]"
        id="kelas_id_{{ $registrasi->registrasi_id }}" class="bg-gray-100 p-2 rounded"
        @if ($registrasi->status !== 'approve' && old("status.{$registrasi->registrasi_id}") !== 'approve') disabled @endif required>
        <option value="">Select a Class</option>

        @foreach ($kelasMatakuliah as $kelasItem)
            <option value="{{ $kelasItem->id }}"
                {{ old("kelas_id.{$registrasi->registrasi_id}", $registrasi->kelas_id) == $kelasItem->id ? 'selected' : '' }}>
                {{ $kelasItem->kelas_name }}
            </option>
        @endforeach
    </select>
</div>



                        </div>
                    @endif
                @endforeach

                <!-- Single Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="w-full md:w-1/2 bg-blue-500 text-white font-bold py-3 rounded-lg hover:bg-blue-600 transition duration-300">
                        Update Status
                    </button>
                </div>
            </form>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <x-footer></x-footer>
</body>

</html>

<script>
    document.querySelectorAll('.status-dropdown').forEach((dropdown) => {
        dropdown.addEventListener('change', function() {
            const registrasiId = this.dataset.registrasiId;
            const classSelection = document.querySelector(`#class-selection-${registrasiId}`);
            const kelasDropdown = document.querySelector(`#kelas_id_${registrasiId}`);

            if (this.value === 'approve') {
                classSelection.style.display = 'block';
                kelasDropdown.removeAttribute('disabled');
                kelasDropdown.setAttribute('required', 'required');
            } else {
                classSelection.style.display = 'none';
                kelasDropdown.setAttribute('disabled', 'disabled');
                kelasDropdown.removeAttribute('required');
            }
        });
    });
</script>
