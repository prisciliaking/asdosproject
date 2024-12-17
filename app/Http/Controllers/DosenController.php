<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    // Menampilkan semua data dosen
    public function index()
    {
        $dosens = Dosen::where('is_deleted', false)->get();
        return response()->json($dosens);
    }

    // Menampilkan data dosen berdasarkan ID
    public function show($id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen || $dosen->is_deleted) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }

        return response()->json($dosen);
    }

    // Menambahkan data dosen baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dosen_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dosen = Dosen::create($request->only(['dosen_name']));

        return response()->json(['message' => 'Dosen created successfully', 'data' => $dosen], 201);
    }

    // Mengupdate data dosen berdasarkan ID
    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen || $dosen->is_deleted) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'dosen_name' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dosen->update($request->only(['dosen_name']));

        return response()->json(['message' => 'Dosen updated successfully', 'data' => $dosen]);
    }

    // Menghapus data dosen (soft delete)
    public function destroy($id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen || $dosen->is_deleted) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }

        $dosen->update(['is_deleted' => true]);

        return response()->json(['message' => 'Dosen deleted successfully']);
    }
}
