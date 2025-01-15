<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $mataKuliahs = MataKuliah::all();
        return response()->json($mataKuliahs);
    }

    // Show the form for creating a new resource (if using views)
    public function create()
    {
        return view('addCourse');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matkul_name' => 'required|string|max:255',
            'isOpen' => 'required|boolean',
        ]);

        $mataKuliah = MataKuliah::create($validatedData);

        return response()->json(['message' => 'Mata kuliah created successfully', 'data' => $mataKuliah], 201);
    }

    // Display the specified resource
    public function show($id)
    {
        $mataKuliah = MataKuliah::find($id);

        if (!$mataKuliah) {
            return response()->json(['message' => 'Mata kuliah not found'], 404);
        }

        return response()->json($mataKuliah);
    }

    // Show the form for editing the specified resource (if using views)
    public function edit($id)
    {
        $mataKuliah = MataKuliah::find($id);

        if (!$mataKuliah) {
            return redirect()->route('mataKuliahs.index')->with('error', 'Mata kuliah not found');
        }

        return view('mata_kuliahs.edit', compact('mataKuliah'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'matkul_name' => 'required|string|max:255',
            'isOpen' => 'required|boolean',
        ]);

        $mataKuliah = MataKuliah::find($id);

        if (!$mataKuliah) {
            return response()->json(['message' => 'Mata kuliah not found'], 404);
        }

        $mataKuliah->update($validatedData);

        return response()->json(['message' => 'Mata kuliah updated successfully', 'data' => $mataKuliah]);
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $mataKuliah = MataKuliah::find($id);

        if (!$mataKuliah) {
            return response()->json(['message' => 'Mata kuliah not found'], 404);
        }

        $mataKuliah->delete();

        return response()->json(['message' => 'Mata kuliah deleted successfully']);
    }
}
