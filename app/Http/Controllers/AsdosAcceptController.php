<?php

namespace App\Http\Controllers;

use App\Models\AsdosAccept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsdosAcceptController extends Controller
{
    public function index()
    {
        $asdosAssignments = AsdosAccept::with(['kelasMatakuliah', 'user'])->get();
        return view('approvedDetail', compact('asdosAssignments'));
    }

    public function showAsdos()
    {
        $asdosAssignments = AsdosAccept::with(['kelasMatakuliah', 'user'])->get();
        return view('approved', compact('asdosAssignments'));
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
        $acceptedCourses = AsdosAccept::with(['kelasMatakuliah, user'])
            ->where('user_id', $userId)
            ->get();

        // Return the view with the user and accepted courses data
        return view('studentApproval', [
            'user' => Auth::user(),
            'acceptedCourses' => $acceptedCourses,
        ]);
    }
}
