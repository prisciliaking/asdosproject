<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KelasMataKuliah;

class KelasMataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $kelasMataKuliahs = [
            ['kelas_name' => 'Kelas Alpro A', 'mata_kuliah_hari' => 'Senin', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://abcd.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 1, 'matkul_id' => 1],
            ['kelas_name' => 'Kelas Alpro B', 'mata_kuliah_hari' => 'Senin', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://efgh.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 6, 'matkul_id' => 1],
            ['kelas_name' => 'Kelas ICT', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '08.20', 'whats_app_link' => 'https://ijkl.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 8, 'matkul_id' => 2],
            ['kelas_name' => 'Kelas COA', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '11.40', 'whats_app_link' => 'https://mnop.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 7, 'matkul_id' => 3],
            ['kelas_name' => 'Kelas Algebra', 'mata_kuliah_hari' => 'Jumat', 'mata_kuliah_jam' => '09.10', 'whats_app_link' => 'https://qrst.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 10, 'matkul_id' => 4],
            ['kelas_name' => 'Kelas OOP A', 'mata_kuliah_hari' => 'Senin', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://uvwx.com', 'kelas_semester' => 'genap', 'dosen_id' => 2, 'matkul_id' => 5],
            ['kelas_name' => 'Kelas OOP B', 'mata_kuliah_hari' => 'Senin', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://yzab.com', 'kelas_semester' => 'genap', 'dosen_id' => 5, 'matkul_id' => 5],
            ['kelas_name' => 'Kelas WebProg A', 'mata_kuliah_hari' => 'Kamis', 'mata_kuliah_jam' => '13.20', 'whats_app_link' => 'https://cdef.com', 'kelas_semester' => 'genap', 'dosen_id' => 1, 'matkul_id' => 6],
            ['kelas_name' => 'Kelas WebProg B', 'mata_kuliah_hari' => 'Kamis', 'mata_kuliah_jam' => '13.20', 'whats_app_link' => 'https://ghij.com', 'kelas_semester' => 'genap', 'dosen_id' => 8, 'matkul_id' => 6],
            ['kelas_name' => 'Kelas Database A', 'mata_kuliah_hari' => 'Senin', 'mata_kuliah_jam' => '10.00', 'whats_app_link' => 'https://klmn.com', 'kelas_semester' => 'genap', 'dosen_id' => 9, 'matkul_id' => 7],
            ['kelas_name' => 'Kelas Database B', 'mata_kuliah_hari' => 'Senin', 'mata_kuliah_jam' => '10.00', 'whats_app_link' => 'https://opqr.com', 'kelas_semester' => 'genap', 'dosen_id' => 1, 'matkul_id' => 7],
            ['kelas_name' => 'Kelas Calculus', 'mata_kuliah_hari' => 'Jumat', 'mata_kuliah_jam' => '09.10', 'whats_app_link' => 'https://stuv.com', 'kelas_semester' => 'genap', 'dosen_id' => 10, 'matkul_id' => 8],
            ['kelas_name' => 'Kelas Visprog', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://wxyz.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 2, 'matkul_id' => 9],
            ['kelas_name' => 'Kelas WebDev', 'mata_kuliah_hari' => 'Kamis', 'mata_kuliah_jam' => '13.20', 'whats_app_link' => 'https://abc.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 9, 'matkul_id' => 10],
            ['kelas_name' => 'Kelas Discrete Math', 'mata_kuliah_hari' => 'Rabu', 'mata_kuliah_jam' => '11.40', 'whats_app_link' => 'https://def.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 4, 'matkul_id' => 11],
            ['kelas_name' => 'Kelas Oprating System', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '14.10', 'whats_app_link' => 'https://ghi.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 3, 'matkul_id' => 12],
            ['kelas_name' => 'Kelas DEI A', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://jkl.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 5, 'matkul_id' => 13],
            ['kelas_name' => 'Kelas DEI B', 'mata_kuliah_hari' => 'Selasa', 'mata_kuliah_jam' => '07.30', 'whats_app_link' => 'https://mno.com', 'kelas_semester' => 'ganjil', 'dosen_id' => 7, 'matkul_id' => 13],
            ['kelas_name' => 'Kelas Statistic', 'mata_kuliah_hari' => 'Rabu', 'mata_kuliah_jam' => '14.10', 'whats_app_link' => 'https://pqr.com', 'kelas_semester' => 'genap', 'dosen_id' => 4, 'matkul_id' => 14],
            ['kelas_name' => 'Kelas Civics', 'mata_kuliah_hari' => 'Kamis', 'mata_kuliah_jam' => '08.20', 'whats_app_link' => 'https://stu.com', 'kelas_semester' => 'genap', 'dosen_id' => 3, 'matkul_id' => 15],
            ['kelas_name' => 'Kelas Big Data', 'mata_kuliah_hari' => 'Senin', 'mata_kuliah_jam' => '08.20', 'whats_app_link' => 'https://vwx.com', 'kelas_semester' => 'genap', 'dosen_id' => 5, 'matkul_id' => 16],
        ];

        foreach ($kelasMataKuliahs as $kelas) {
            if (!KelasMataKuliah::where('kelas_name', $kelas['kelas_name'])->exists()) {
                KelasMataKuliah::create($kelas);
            }
        }
    }
}