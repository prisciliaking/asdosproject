<?php

namespace App\Http\Controllers;

use App\Models\KelasMataKuliah;
use App\Http\Controllers\MataKuliahController;
use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KelasMataKuliahController extends Controller
{
    public function index()
    {
        // Mengambil semua data kelas mata kuliah
        $courses = KelasMataKuliah::with('Dosen', 'MataKuliah')->get();

        // Mengirim data ke view
        return view('courses', compact('courses'));
    }

    // Menampilkan form untuk membuat kelas mata kuliah baru
    public function create()
    {
        $mataKuliahs = MataKuliah::all(); // Fetch all MataKuliah records
        $dosens = Dosen::all();          // Fetch all Dosen records

        if ($mataKuliahs->isEmpty()) {
            return back()->withErrors(['error' => 'No courses found.']);
        }

        // Pass the data to the 'addCourse' view
        return view('addCourse', compact('mataKuliahs', 'dosens'));
    }


    // Menyimpan kelas mata kuliah baru ke database
    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'kelas_name' => 'required|string|max:255',
            'mata_kuliah_hari' => 'required|string|max:255',
            'mata_kuliah_jam' => 'required|string|max:255',
            'whats_app_link' => 'nullable|url',
            'kelas_semester' => 'required|string|max:255',
            'matkul_id' => 'required|exists:mata_kuliahs,matkul_id',
            'dosen_id' => 'required|exists:dosens,dosen_id',
        ]);
        Log::info('Validated Data:', $validatedData);

        try {
            // Create a new KelasMataKuliah record
            $kelasMataKuliah = new KelasMataKuliah();
            $kelasMataKuliah->kelas_name = $validatedData['kelas_name'];
            $kelasMataKuliah->mata_kuliah_hari = $validatedData['mata_kuliah_hari'];
            $kelasMataKuliah->mata_kuliah_jam = $validatedData['mata_kuliah_jam'];
            $kelasMataKuliah->whats_app_link = $validatedData['whats_app_link'];
            $kelasMataKuliah->kelas_semester = $validatedData['kelas_semester'];
            $kelasMataKuliah->matkul_id = $validatedData['matkul_id'];
            $kelasMataKuliah->dosen_id = $validatedData['dosen_id'];


            Log::info('Data yang akan disimpan:', [
                'kelas_name' => $kelasMataKuliah->kelas_name,
                'mata_kuliah_hari' => $kelasMataKuliah->mata_kuliah_hari,
                'mata_kuliah_jam' => $kelasMataKuliah->mata_kuliah_jam,
                'whats_app_link' => $kelasMataKuliah->whats_app_link,
                'kelas_semester' => $kelasMataKuliah->kelas_semester,
                'matkul_id' => $kelasMataKuliah->matkul_id,
                'dosen_id' => $kelasMataKuliah->dosen_id
            ]);            // Save the data to the database
            $kelasMataKuliah->save();

            // Redirect to the courses index page with success message
            return redirect()->route('courses.index')->with('success', 'Kelas Mata Kuliah created successfully!');
        } catch (\Exception $e) {
            // Log the exception error message before returning the error response
            Log::error('Error saat menyimpan data:', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);            // Catch any errors and return an error message
            return back()->withErrors(['error' => 'Failed to create class: ' . $e->getMessage()]);
        }
    }



    // Menampilkan detail kelas mata kuliah tertentu
    public function show($id)
    {
        // Mencari kelas mata kuliah berdasarkan ID dan memuat relasi
        $kelasMataKuliah = KelasMataKuliah::with(['Dosen', 'MataKuliah'])->find($id);

        if (!$kelasMataKuliah) {
            return response()->json(['message' => 'Kelas Mata Kuliah not found'], 404);
        }

        // Mengembalikan data kelas mata kuliah
        return response()->json($kelasMataKuliah);
    }

    // Menampilkan form untuk mengedit kelas mata kuliah
    public function edit($id)
    {
        // Mencari kelas mata kuliah berdasarkan ID
        $kelasMataKuliah = KelasMataKuliah::find($id);
        $mataKuliahs = MataKuliah::all();
        $dosens = Dosen::all();

        if (!$kelasMataKuliah) {
            return redirect()->route('kelasMataKuliahs.index')->with('error', 'Kelas Mata Kuliah not found');
        }

        // Mengirim data ke view edit
        return view('kelas_mata_kuliahs.edit', compact('kelasMataKuliah', 'mataKuliahs', 'dosens'));
    }

    // Memperbarui data kelas mata kuliah
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'kelas_name' => 'required|string|max:255',
            'mata_kuliah_hari' => 'required|string|max:255',
            'mata_kuliah_jam' => 'required|string|max:255',
            'whats_app_link' => 'nullable|url',
            'kelas_semester' => 'required|string|max:255',
            'matkul_id' => 'required|exists:mata_kuliahs,matkul_id',
            'dosen_id' => 'required|exists:dosens,dosen_id',
        ]);

        // Mencari kelas mata kuliah berdasarkan ID
        $kelasMataKuliah = KelasMataKuliah::find($id);

        if (!$kelasMataKuliah) {
            return response()->json(['message' => 'Kelas Mata Kuliah not found'], 404);
        }

        // Memperbarui data
        $kelasMataKuliah->update($validatedData);

        // Mengembalikan response berhasil
        return response()->json(['message' => 'Kelas Mata Kuliah updated successfully', 'data' => $kelasMataKuliah]);
    }

    // Menghapus kelas mata kuliah
    public function destroy($id)
    {
        // Mencari kelas mata kuliah berdasarkan ID
        $kelasMataKuliah = KelasMataKuliah::find($id);

        if (!$kelasMataKuliah) {
            return response()->json(['message' => 'Kelas Mata Kuliah not found'], 404);
        }

        // Menghapus data
        $kelasMataKuliah->delete();

        // Mengembalikan response berhasil
        return response()->json(['message' => 'Kelas Mata Kuliah deleted successfully']);
    }
}


// public function showByMataKuliah($mata_kuliah_id)
// {
//     // Fetch all Kelas Mata Kuliah via matkul_dosen_id matching mata_kuliah_id
//     $courses = KelasMataKuliah::whereHas('mataKuliahDosen', function ($query) use ($mata_kuliah_id) {
//             $query->where('mata_kuliah_id', $mata_kuliah_id);
//         })
//         ->with('mataKuliahDosen.dosen') // Load MataKuliahDosen and associated Dosen
//         ->get();

//     return view('courses-Details', compact('courses'));
// }