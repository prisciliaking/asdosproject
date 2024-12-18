<?php

namespace Database\Seeders;

use App\Models\KelasMataKuliah;
use App\Models\MataKuliahDosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasMataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        // Predefined Kelas Mata Kuliah data
        $kelasMataKuliah = [
            ['kelas_nama' => 'Kelas A', 'mata_kuliah_hari' => 'Senin',  'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://abcd.com', 'kelas_semester' => 'Ganjil', 'matkul_dosen_id' => 1],
            ['kelas_nama' => 'Kelas B', 'mata_kuliah_hari' => 'Senin',  'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://efgh.com', 'kelas_semester' => 'Ganjil', 'matkul_dosen_id' => 6],
            ['kelas_nama' => 'Kelas C', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '08.20', 'whats_app_link' => 'https://ijkl.com', 'kelas_semester' => 'Ganjil', 'matkul_dosen_id' => 8],
            ['kelas_nama' => 'Kelas D', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '11.40', 'whats_app_link' => 'https://mnop.com', 'kelas_semester' => 'Ganjil', 'matkul_dosen_id' => 7],
            ['kelas_nama' => 'Kelas E', 'mata_kuliah_hari' => 'Jumat',  'mata_kuliah_jam' => '09.10', 'whats_app_link' => 'https://qrst.com', 'kelas_semester' => 'Ganjil', 'matkul_dosen_id' => 10],
            ['kelas_nama' => 'Kelas F', 'mata_kuliah_hari' => 'Senin',  'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://uvwx.com', 'kelas_semester' => 'Genap', 'matkul_dosen_id' => 2],
            ['kelas_nama' => 'Kelas G', 'mata_kuliah_hari' => 'Senin',  'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://yzab.com', 'kelas_semester' => 'Genap', 'matkul_dosen_id' => 5],
            ['kelas_nama' => 'Kelas H', 'mata_kuliah_hari' => 'Kamis',  'mata_kuliah_jam' => '13.20', 'whats_app_link' => 'https://cdef.com', 'kelas_semester' => 'Genap', 'matkul_dosen_id' => 1],
            ['kelas_nama' => 'Kelas I', 'mata_kuliah_hari' => 'Kamis',  'mata_kuliah_jam' => '13.20', 'whats_app_link' => 'https://ghij.com', 'kelas_semester' => 'Genap', 'matkul_dosen_id' => 8],
            ['kelas_nama' => 'Kelas J', 'mata_kuliah_hari' => 'Senin',  'mata_kuliah_jam' => '10.00', 'whats_app_link' => 'https://klmn.com', 'kelas_semester' => 'Genap', 'matkul_dosen_id' => 9],
            ['kelas_nama' => 'Kelas K', 'mata_kuliah_hari' => 'Senin',  'mata_kuliah_jam' => '10.00', 'whats_app_link' => 'https://opqr.com', 'kelas_semester' => 'Genap', 'matkul_dosen_id' => 1],
            ['kelas_nama' => 'Kelas L', 'mata_kuliah_hari' => 'Jumat',  'mata_kuliah_jam' => '09.10', 'whats_app_link' => 'https://stuv.com', 'kelas_semester' => 'Genap', 'matkul_dosen_id' => 10],
            ['kelas_nama' => 'Kelas M', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://wxyz.com', 'kelas_semester' => 'Ganjil', 'matkul_dosen_id' => 2],
            ['kelas_nama' => 'Kelas N', 'mata_kuliah_hari' => 'Kamis',  'mata_kuliah_jam' => '13.20', 'whats_app_link' => 'https://abc.com',  'kelas_semester' => 'Ganjil', 'matkul_dosen_id' => 9],
            ['kelas_nama' => 'Kelas O', 'mata_kuliah_hari' => 'Rabu',   'mata_kuliah_jam' => '11.40', 'whats_app_link' => 'https://def.com',  'kelas_semester' => 'Ganjil', 'matkul_dosen_id' => 4],
            ['kelas_nama' => 'Kelas P', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '14.10', 'whats_app_link' => 'https://ghi.com',  'kelas_semester' => 'Ganjil', 'matkul_dosen_id' => 3],
            ['kelas_nama' => 'Kelas Q', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://jkl.com',  'kelas_semester' => 'Genap', 'matkul_dosen_id' => 5],
            ['kelas_nama' => 'Kelas R', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://mno.com',  'kelas_semester' => 'Genap', 'matkul_dosen_id' => 7],
            ['kelas_nama' => 'Kelas S', 'mata_kuliah_hari' => 'Rabu',   'mata_kuliah_jam' => '14.10', 'whats_app_link' => 'https://pqr.com',  'kelas_semester' => 'Genap', 'matkul_dosen_id' => 4],
            ['kelas_nama' => 'Kelas T', 'mata_kuliah_hari' => 'Kamis',  'mata_kuliah_jam' => '08.20', 'whats_app_link' => 'https://stu.com',  'kelas_semester' => 'Genap', 'matkul_dosen_id' => 3],
            ['kelas_nama' => 'Kelas U', 'mata_kuliah_hari' => 'Senin',  'mata_kuliah_jam' => '08.20', 'whats_app_link' => 'https://vwx.com',  'kelas_semester' => 'Genap', 'matkul_dosen_id' => 5],
        ];

        // Insert Kelas Mata Kuliah data without duplicates
        foreach ($kelasMataKuliah as $kelas) {
            KelasMataKuliah::firstOrCreate([
                'kelas_nama' => $kelas['kelas_nama'],
                'mata_kuliah_hari' => $kelas['mata_kuliah_hari'],
                'mata_kuliah_jam' => $kelas['mata_kuliah_jam'],
            ], [
                'whats_app_link' => $kelas['whats_app_link'],
                'kelas_semester' => $kelas['kelas_semester'],
                'matkul_dosen_id' => $kelas['matkul_dosen_id'],
            ]);
        }
    }
    // public function run(): void
    // {
    //     // Create 10 KelasMataKuliah entries
    //     KelasMataKuliah::factory()->count(10)->create();
    // }
}
