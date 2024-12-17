<?php

namespace App\Http\Controllers;

use App\Models\KelasMataKuliah;

class KelasMataKuliahController extends Controller
{
    public function index()
    {
        // Mengambil semua data kelas mata kuliah
        $courses = KelasMataKuliah::with('mataKuliahDosen')->get();

        // Mengirim data ke view
        return view('courses', compact('courses'));
        
    }
}
