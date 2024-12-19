<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliahDosen;
use Illuminate\Support\Facades\Validator;

class MataKuliahDosenController extends Controller
{
    // Menampilkan semua data Mata Kuliah Dosen
    public function index()
    {
        $mataKuliahDosen = MataKuliahDosen::with(['dosen', 'mataKuliah'])->get();
        return response()->json($mataKuliahDosen);
    }

    // Menampilkan data Mata Kuliah Dosen berdasarkan ID
    public function show($id)
    {
        $mataKuliahDosen = MataKuliahDosen::with(['dosen', 'mataKuliah'])->find($id);

        if (!$mataKuliahDosen) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($mataKuliahDosen);
    }

    // Menambahkan data Mata Kuliah Dosen baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dosen_id' => 'required|exists:dosens,dosen_id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,mata_kuliah_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $mataKuliahDosen = MataKuliahDosen::create($request->only(['dosen_id', 'mata_kuliah_id']));

        return response()->json(['message' => 'Data created successfully', 'data' => $mataKuliahDosen], 201);
    }
}

// Mengupdate data Mata Kuliah Dosen berdasarkan ID
    // public function update(Request $request, $id)
    // {
    //     $mataKuliahDosen = MataKuliahDosen::find($id);

    //     if (!$mataKuliahDosen) {
    //         return response()->json(['message' => 'Data not found'], 404);
    //     }

    //     $validator = Validator::make($request->all(), [
    //         'dosen_id' => 'sometimes|exists:dosens,dosen_id',
    //         'mata_kuliah_id' => 'sometimes|exists:mata_kuliahs,mata_kuliah_id',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $mataKuliahDosen->update($request->only(['dosen_id', 'mata_kuliah_id']));

    //     return response()->json(['message' => 'Data updated successfully', 'data' => $mataKuliahDosen]);
    // }

    // // Menghapus data Mata Kuliah Dosen berdasarkan ID
    // public function destroy($id)
    // {
    //     $mataKuliahDosen = MataKuliahDosen::find($id);

    //     if (!$mataKuliahDosen) {
    //         return response()->json(['message' => 'Data not found'], 404);
    //     }

    //     $mataKuliahDosen->delete();

    //     return response()->json(['message' => 'Data deleted successfully']);
    // }
