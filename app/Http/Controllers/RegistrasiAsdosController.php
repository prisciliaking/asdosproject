<?php

namespace App\Http\Controllers;

use App\Models\KelasMataKuliah;
use App\Models\AsdosAccept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RegistrasiAsdos;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Log;

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
    public function index()
    {
        // Fetch all RegistrasiAsdos records
        $kelasMatakuliah = KelasMataKuliah::all();
        $asdos = RegistrasiAsdos::all();

        // Return to the view with the data
        return view('registeredAsdos', compact('asdos', 'kelasMatakuliah', 'mataKuliah'));
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

    // Show registered Asdos for a specific course
    public function show(MataKuliah $mataKuliah)
    {
        // Fetch the registrations for the given MataKuliah
        $asdos = $mataKuliah->registrasiAsdos()->with('user')->get();

        // Return the view with MataKuliah and Asdos data
        return view('registeredAsdos', compact('mataKuliah', 'asdos'));
    }
    
    public function updateStatus(Request $request)
    {
        $data = $request->all();
    
        foreach ($data['status'] as $registrasiId => $status) {
            // Find the RegistrasiAsdos entry
            $registrasi = RegistrasiAsdos::find($registrasiId);
    
            // Update status of the RegistrasiAsdos
            $registrasi->status = $status;
            $registrasi->save();
    
            // If the status is 'approve' and a class is selected, save to AsdosAccept
            if ($status === 'approve' && isset($data['kelas_id'][$registrasiId])) {
                $kelasId = $data['kelas_id'][$registrasiId];
                $userId = $registrasi->user_id; // Retrieve the user_id from RegistrasiAsdos
    
                // Call the createAsdosAccept method to save the record
                app(AsdosAcceptController::class)->createAsdosAccept($userId, $kelasId);
            }
        }
    
        // Redirect back with success message
        return redirect()->route('registrasiAsdos.index')->with('success', 'Status updated successfully');
    }
    


    /**
     * Show the registrations of Asdos for a specific MataKuliah.
     */
    public function     showRegisteredAsdos($matkulId)
    {
        // Fetch MataKuliah by ID
        $mataKuliah = MataKuliah::find($matkulId);

        // Fetch Asdos registrations that are waiting for the specific matkul_id
        $asdos = RegistrasiAsdos::where('matkul_id', $matkulId)->where('status', 'waiting')->get();

        // Fetch all KelasMataKuliah
        $kelasMatakuliah = KelasMataKuliah::all();

        // Fetch all MataKuliah
        $mataKuliahs = MataKuliah::all();

        // Pass the necessary data to the view
        return view('registeredAsdos', compact('asdos', 'kelasMatakuliah', 'mataKuliah', 'mataKuliahs'));
    }
}
