<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RegistrasiAsdos;
use App\Models\Matakuliah;

class RegistrasiAsdosController extends Controller
{
    /**
     * Show the registration form for Asdos.
     */
    public function create()
    {
        // Get only the courses that are open (where isOpen is 1)
        $mataKuliah = Matakuliah::where('isOpen', 1)->get();

        // Pass the open courses to the view
        return view('registerAsdos', compact('mataKuliah'));
    }

    /**
     * Store the Asdos registration data.
     */
    public function store(Request $request)
    {
        // Get the user ID from the authenticated session
        $userId = Auth::id();

        // Validate the input: user must select between 1 and 3 courses
        $validatedData = $request->validate([
            'matkul_ids' => 'required|array|min:1|max:3', // Ensure it’s an array of up to 3 items
            'matkul_ids.*' => 'exists:mata_kuliahs,matkul_id', // Validate each selected course ID
        ]);

        // Check if the user is already registered
        $alreadyRegistered = RegistrasiAsdos::where('user_id', $userId)->exists();
        if ($alreadyRegistered) {
            return redirect()->back()->withErrors(['error' => 'You can only register once.']);
        }

        // Loop through each selected course and store it as a new registration
        foreach ($validatedData['matkul_ids'] as $matkulId) {
            RegistrasiAsdos::create([
                'user_id' => $userId,
                'matkul_id' => $matkulId,
                'status' => 'waiting',
            ]);
        }

        // Redirect back with success message
        return redirect()->route('registrasiAsdos.create')->with('success', 'Registration successful for the selected courses, status: waiting');
    }
}