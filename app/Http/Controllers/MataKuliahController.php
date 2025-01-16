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
        return view('viewMataKuliah', compact('mataKuliahs'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matkul_name' => 'required|string|max:255',
            'isOpen' => 'required|boolean',
        ]);

        // Create the MataKuliah record
        $mataKuliah = MataKuliah::create($validatedData);

        // Redirect to the index page with success message
        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah created successfully');
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

    public function updateIsOpen(Request $request, $id)
{
    $mataKuliah = MataKuliah::find($id);

    if (!$mataKuliah) {
        return response()->json(['message' => 'Mata kuliah not found'], 404);
    }

    // Update the isOpen field based on the incoming request
    $mataKuliah->update(['isOpen' => $request->input('isOpen')]);

    return response()->json(['success' => true]);
}


    // Remove the specified resource from storage
    public function destroy($id)
    {
        $mataKuliah = MataKuliah::find($id);

        if (!$mataKuliah) {
            return redirect()->route('mataKuliahs.index')->with('error', 'Mata kuliah not found');
        }

        // Delete the Mata Kuliah record
        $mataKuliah->delete();

        // Redirect with success message
        return redirect()->route('mataKuliahs.index')->with('success', 'Mata kuliah deleted successfully');
    }
}
