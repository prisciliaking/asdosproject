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
    public function userAcceptedCourses()
{
    // Retrieve the user's name from the session
    $userName = session('user_name');

    if (!$userName) {
        return redirect()->route('login')->with('error', 'Please log in to see your accepted courses.');
    }

    // Find the user by their name
    $user = \App\Models\User::where('user_name', $userName)->first();

    if (!$user) {
        return redirect()->route('login')->with('error', 'User not found.');
    }

    // Get accepted courses with all related data using eager loading
    $acceptedCourses = MataKuliahAccept::where('user_id', $user->user_id)
        ->with([
            'mataKuliah.mataKuliahDosen.dosen' // Correct relationship path
        ])
        ->get();

    // Pass the data to the view
    return view('studentApproval', [
        'acceptedCourses' => $acceptedCourses,
        'user' => $user
    ]);
}

}
