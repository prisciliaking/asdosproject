<?php
// app/Http/Controllers/MataKuliahAcceptController.php

namespace App\Http\Controllers;

use App\Models\MataKuliahAccept;
use App\Models\KelasMataKuliah;
use App\Models\User;
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
        // Retrieve the user's name and role_id from the session
        $userName = session('user_name');
        $role_id = session('role_id');
    
        // Validate the user's role
        if (!$userName || $role_id != 1) {
            return redirect()->route('login')->with('error', 'Please log in as a mahasiswa to view accepted courses.');
        }
    
        // Find the user by their name
        $user = User::where('user_name', $userName)->first();
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }
    
        // Fetch accepted courses for the user with all necessary relationships
        $acceptedCourses = MataKuliahAccept::where('user_id', $user->user_id)
            ->with([
                'mataKuliah.mataKuliahDosen.dosen' // Eager load MataKuliahDosen and Dosen
            ])
            ->get();
    
        // Pass data to the view
        return view('studentApproval', [
            'acceptedCourses' => $acceptedCourses,
            'user' => $user
        ]);
    }
    
}
