<?php

namespace App\Http\Controllers;

use App\Models\KelasMataKuliah;
use App\Http\Controllers\MataKuliahController;
use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\AsdosAccept;
use App\Models\RegistrasiAsdos;

class KelasMataKuliahController extends Controller
{
    public function index()
    {
        // Mengambil semua data kelas mata kuliah
        $courses = KelasMataKuliah::with('Dosen', 'MataKuliah')->get();

        // Mengirim data ke view
        return view('courses', compact('courses'));
    }

    // Menampilkan form untuk membuat kelas mata kuliah baru
    public function create()
    {
        $mataKuliahs = MataKuliah::all(); // Fetch all MataKuliah records
        $dosens = Dosen::all();          // Fetch all Dosen records

        if ($mataKuliahs->isEmpty()) {
            return back()->withErrors(['error' => 'No courses found.']);
        }

        // Pass the data to the 'addCourse' view
        return view('addCourse', compact('mataKuliahs', 'dosens'));
    }


    // Menyimpan kelas mata kuliah baru ke database
    public function store(Request $request)
    {
        Log::info('Starting store function');
        Log::info('Request data:', $request->all()); // Cek data yang diterima

        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'kelas_name' => 'required|string|max:255',
                'mata_kuliah_hari' => 'required|string|max:255',
                'mata_kuliah_jam' => 'required|string|max:255',
                'whats_app_link' => 'nullable|url',
                'kelas_semester' => 'required|string|max:255',
                'matkul_id' => 'required|exists:mata_kuliahs,matkul_id',
                'dosen_id' => 'required|exists:dosens,dosen_id',
            ]);

            Log::info('Validation passed', $validatedData); // Cek hasil validasi

            // Buat instance baru dan set nilai secara eksplisit
            $kelasMataKuliah = new KelasMataKuliah();
            $kelasMataKuliah->kelas_name = $validatedData['kelas_name'];
            $kelasMataKuliah->mata_kuliah_hari = $validatedData['mata_kuliah_hari'];
            $kelasMataKuliah->mata_kuliah_jam = $validatedData['mata_kuliah_jam'];
            $kelasMataKuliah->whats_app_link = $validatedData['whats_app_link'];
            $kelasMataKuliah->kelas_semester = $validatedData['kelas_semester'];
            $kelasMataKuliah->matkul_id = $validatedData['matkul_id'];
            $kelasMataKuliah->dosen_id = $validatedData['dosen_id'];

            Log::info('Before saving', $kelasMataKuliah->toArray()); // Cek data sebelum disimpan

            if ($kelasMataKuliah->save()) {
                Log::info('Data saved successfully');
                DB::commit();
                return redirect()->route('courses.index')
                    ->with('success', 'Kelas Mata Kuliah created successfully!');
            } else {
                Log::error('Failed to save data');
                DB::rollBack();
                throw new \Exception('Failed to save data');
            }
        } catch (ValidationException $e) {
            DB::rollBack();
            Log::error('Validation failed:', [
                'errors' => $e->errors(),
                'request_data' => $request->all()
            ]);
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create class: ' . $e->getMessage()]);
        }
    }

    // Menampilkan detail kelas mata kuliah tertentu
    public function show($id)
    {
        // Mencari kelas mata kuliah berdasarkan ID dan memuat relasi
        $courses = KelasMataKuliah::with(['Dosen', 'MataKuliah'])->find($id);

        if (!$courses) {
            return response()->json(['message' => 'Kelas Mata Kuliah not found'], 404);
        }

        // Mengembalikan data kelas mata kuliah
        return view('courses', compact('courses'));
    }

    // Menampilkan form untuk mengedit kelas mata kuliah
    public function edit($id)
    {
        // Mencari kelas mata kuliah berdasarkan ID
        $courses = KelasMataKuliah::find($id);
        $mataKuliahs = MataKuliah::all();
        $dosens = Dosen::all();

        if (!$courses) {
            return redirect()->route('kelasMataKuliahs.index')->with('error', 'Kelas Mata Kuliah not found');
        }

        // Mengirim data ke view edit
        return view('editClassCourses', compact('courses', 'mataKuliahs', 'dosens'));
    }


    // Memperbarui data kelas mata kuliah
    public function updateStatus(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|array',
            'status.*' => 'in:waiting,approve,rejected',
            'kelas_id' => 'nullable|array',
            'kelas_id.*' => 'exists:kelas_mata_kuliah,id', // Validate kelas_id exists in KelasMataKuliah
        ]);

        foreach ($request->status as $registrasiId => $status) {
            $registrasi = RegistrasiAsdos::findOrFail($registrasiId);
            $registrasi->status = $status;
            $registrasi->save();

            // If status is 'approve' and kelas_id is provided
            if ($status === 'approve' && isset($request->kelas_id[$registrasiId])) {
                // Save into AsdosAccept with the user_id and kelas_id
                AsdosAccept::create([
                    'user_id' => $registrasi->user_id, // Take user_id from RegistrasiAsdos
                    'kelas_id' => $request->kelas_id[$registrasiId], // Take kelas_id from the form
                ]);
            }
        }

        return redirect()->route('registrasiAsdos.index')->with('success', 'Status updated successfully!');
    }
}
