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


    public function getByUser($userId)
    {
        $asdosAssignments = AsdosAccept::with(['kelasMatakuliah'])
            ->where('user_id', $userId)
            ->get();

        return response()->json($asdosAssignments);
    }

    public function getMyAssignments()
    {
        $userId = Auth::id();
        $asdosAssignments = AsdosAccept::with(['kelasMatakuliah'])
            ->where('user_id', $userId)
            ->get();

        return response()->json($asdosAssignments);
    }
}
