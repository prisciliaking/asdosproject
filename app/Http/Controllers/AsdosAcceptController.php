<?php

namespace App\Http\Controllers;

use App\Models\AsdosAccept;
use App\Models\KelasMataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AsdosAcceptController extends Controller
{
    public function index()
    {
        $kelasMatakuliah = KelasMataKuliah::all();  // Get all KelasMataKuliah classes
        $asdosAssignments = AsdosAccept::with(['kelasMataKuliah', 'user'])->get();

        return view('approvedDetail', compact('asdosAssignments', 'kelasMatakuliah'));  // Use $kelasMatakuliah here
    }


    public function showAsdos()
    {
        // Filter AsdosAccept records based on the isOpen condition of the related MataKuliah through KelasMataKuliah
        $asdosAssignments = AsdosAccept::with(['kelasMatakuliah', 'user'])
            ->whereHas('kelasMatakuliah.mataKuliah', function ($query) {
                $query->where('isOpen', 1); // Only include MataKuliah where isOpen = 1
            })
            ->get()
            ->unique('kelas_id'); // Ensure each kelas_id appears only once

        return view('approved', compact('asdosAssignments'));
    }

    public function createAsdosAccept($userId, $kelasId)
    {
        try {
            // Create the AsdosAccept record
            AsdosAccept::create([
                'user_id' => $userId,
                'kelas_id' => $kelasId,
            ]);
            Log::info("AsdosAccept created successfully for user {$userId} with kelas_id {$kelasId}");
        } catch (\Exception $e) {
            Log::error("Failed to create AsdosAccept for user {$userId} with kelas_id {$kelasId}. Error: " . $e->getMessage());
        }
    }



    public function showDetail($kelasId)
    {
        // Fetch assignments related to the specific `kelas_id`
        $asdosAssignments = AsdosAccept::with(['kelasMatakuliah', 'user'])
            ->where('kelas_id', $kelasId)
            ->get();

        // Pass data to the view
        return view('approvedDetail', compact('asdosAssignments'));
    }

    public function getMyAssignments()
    {
        $userId = Auth::id(); // Retrieve the authenticated user's ID

        // Fetch the accepted courses for the authenticated user
        $acceptedCourses = AsdosAccept::with(['kelasMataKuliah', 'user'])
            ->where('user_id', $userId)
            ->get();

        // Return the view with the user and accepted courses data
        return view('studentApproval', [
            'user' => Auth::user(),
            'acceptedCourses' => $acceptedCourses,
        ]);
    }
}
