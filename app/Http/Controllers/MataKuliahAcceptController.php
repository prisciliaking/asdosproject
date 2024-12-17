<?php
// app/Http/Controllers/MataKuliahAcceptController.php

namespace App\Http\Controllers;

use App\Models\MataKuliahAccept;
use App\Models\KelasMataKuliah;
use Illuminate\Http\Request;

class MataKuliahAcceptController extends Controller
{
    /**
     * Display a listing of accepted students.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get all the courses and their associated data (dosen)
        $courses = KelasMataKuliah::with('mataKuliahDosen')->get();
        return view('approved', compact('courses'));
    }

    /**
     * Show accepted students for a given course.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showAcceptedStudents($id)
    {
        // Fetch course details using the provided ID
        $course = KelasMataKuliah::with('mataKuliahDosen')->findOrFail($id);
    
        // Fetch accepted students for the given course
        $acceptedStudents = MataKuliahAccept::where('mata_kuliah_id', $id)
            ->with('user') // Assuming the 'user' relationship is defined in MataKuliahAccept
            ->get();
    
        // Pass the data to the view
        return view('approvedDetail', compact('course', 'acceptedStudents'));
    }
    
}
