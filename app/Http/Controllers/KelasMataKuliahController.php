<?php

namespace App\Http\Controllers;

use App\Models\KelasMataKuliah;

class KelasMataKuliahController extends Controller
{
    public function index()
    {
        // Mengambil semua data kelas mata kuliah
        $courses = KelasMataKuliah::with('Dosen', 'MataKuliah')->get();

        // Mengirim data ke view
        return view('courses', compact('courses'));
        
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