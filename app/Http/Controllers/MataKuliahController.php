<?php

namespace App\Http\Controllers;

use App\Models\KelasMataKuliah;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    // Menampilkan semua data mata kuliah
    public function index()
    {
        $mataKuliahs = MataKuliah::all(); // Fetch all MataKuliahs
        return view('courses', ['mataKuliahs' => $mataKuliahs]);
    }

    // Menampilkan detail data kelas mata kuliah berdasarkan mata_kuliah_id
    public function show($id)
    {
        // Find Mata Kuliah
        $mataKuliah = MataKuliah::find($id);

        if (!$mataKuliah) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }

        // Fetch associated Kelas Mata Kuliah with dosen details
        $kelasDetails = KelasMataKuliah::where('mata_kuliah_id', $id)
            ->with('mataKuliahDosen.dosen') // Load MataKuliahDosen and Dosen details
            ->get();

        return response()->json([
            'mata_kuliah' => $mataKuliah,
            'kelas_details' => $kelasDetails
        ]);
    }
}
// Menambahkan data mata kuliah baru
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'mata_kuliah_nama' => 'required|string|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $mataKuliah = MataKuliah::create($request->only(['mata_kuliah_nama']));

    //     return response()->json(['message' => 'Mata Kuliah created successfully', 'data' => $mataKuliah], 201);
    // }

    // Mengupdate data mata kuliah berdasarkan ID
    // public function update(Request $request, $id)
    // {
    //     $mataKuliah = MataKuliah::find($id);

    //     if (!$mataKuliah) {
    //         return response()->json(['message' => 'Mata Kuliah not found'], 404);
    //     }

    //     $validator = Validator::make($request->all(), [
    //         'mata_kuliah_nama' => 'sometimes|string|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $mataKuliah->update($request->only(['mata_kuliah_nama']));

    //     return response()->json(['message' => 'Mata Kuliah updated successfully', 'data' => $mataKuliah]);
    // }

    // // Menghapus data mata kuliah
    // public function destroy($id)
    // {
    //     $mataKuliah = MataKuliah::find($id);

    //     if (!$mataKuliah) {
    //         return response()->json(['message' => 'Mata Kuliah not found'], 404);
    //     }

    //     $mataKuliah->delete();

    //     return response()->json(['message' => 'Mata Kuliah deleted successfully']);
    // }
