<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliahPilihan;
use Illuminate\Support\Facades\Validator;

class MataKuliahPilihanController extends Controller
{
    // Menampilkan semua data mata kuliah pilihan
    public function index()
    {
        $mataKuliahPilihans = MataKuliahPilihan::with(['user', 'mataKuliah'])->get();
        return response()->json($mataKuliahPilihans);
    }

    // Menampilkan data mata kuliah pilihan berdasarkan ID
    public function show($id)
    {
        $mataKuliahPilihan = MataKuliahPilihan::with(['user', 'mataKuliah'])->find($id);

        if (!$mataKuliahPilihan) {
            return response()->json(['message' => 'Mata Kuliah Pilihan not found'], 404);
        }

        return response()->json($mataKuliahPilihan);
    }
}

// Menambahkan data mata kuliah pilihan baru
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'pilihan_status' => 'required|boolean',
    //         'user_id' => 'required|exists:users,user_id',
    //         'mata_kuliah_id' => 'required|exists:mata_kuliahs,mata_kuliah_id',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $mataKuliahPilihan = MataKuliahPilihan::create($request->only(['pilihan_status', 'user_id', 'mata_kuliah_id']));

    //     return response()->json(['message' => 'Mata Kuliah Pilihan created successfully', 'data' => $mataKuliahPilihan], 201);
    // }

    // // Mengupdate data mata kuliah pilihan berdasarkan ID
    // public function update(Request $request, $id)
    // {
    //     $mataKuliahPilihan = MataKuliahPilihan::find($id);

    //     if (!$mataKuliahPilihan) {
    //         return response()->json(['message' => 'Mata Kuliah Pilihan not found'], 404);
    //     }

    //     $validator = Validator::make($request->all(), [
    //         'pilihan_status' => 'sometimes|boolean',
    //         'user_id' => 'sometimes|exists:users,user_id',
    //         'mata_kuliah_id' => 'sometimes|exists:mata_kuliahs,mata_kuliah_id',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $mataKuliahPilihan->update($request->only(['pilihan_status', 'user_id', 'mata_kuliah_id']));

    //     return response()->json(['message' => 'Mata Kuliah Pilihan updated successfully', 'data' => $mataKuliahPilihan]);
    // }

    // // Menghapus data mata kuliah pilihan
    // public function destroy($id)
    // {
    //     $mataKuliahPilihan = MataKuliahPilihan::find($id);

    //     if (!$mataKuliahPilihan) {
    //         return response()->json(['message' => 'Mata Kuliah Pilihan not found'], 404);
    //     }

    //     $mataKuliahPilihan->delete();

    //     return response()->json(['message' => 'Mata Kuliah Pilihan deleted successfully']);
    // }