<?php
namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        MataKuliah::factory()->count(15)->create();

        $matakuliahs = [
            ['matkul_name' => 'Kelas Alpro', 'isOpen' => 1],
            ['matkul_name' => 'Kelas ICT', 'isOpen' => 1],
            ['matkul_name' => 'Kelas COA', 'isOpen' => 1],
            ['matkul_name' => 'Kela Algebra', 'isOpen' => 1],
            ['matkul_name' => 'Kelas OOP', 'isOpen' => 0],
            ['matkul_name' => 'Kelas Webprog', 'isOpen' => 0],
            ['matkul_name' => 'Kelas Database', 'isOpen' => 0],
            ['matkul_name' => 'Kelas Calculus', 'isOpen' => 0],
            ['matkul_name' => 'Kelas Visprog', 'isOpen' => 1],
            ['matkul_name' => 'Kelas WebDev', 'isOpen' => 1],
            ['matkul_name' => 'Kelas Discrete Math', 'isOpen' => 1],
            ['matkul_name' => 'Kelas Oprating System', 'isOpen' => 1],
            ['matkul_name' => 'Kelas DEI', 'isOpen' => 0],
            ['matkul_name' => 'Kelas Statistic', 'isOpen' => 0],
            ['matkul_name' => 'Kelas Civics', 'isOpen' => 0],
            ['matkul_name' => 'Kelas Big Data', 'isOpen' => 0],
        ];

        foreach ($matakuliahs as $matkul) {
            if (!MataKuliah::where('matkul_name', $matkul['matkul_name'])->exists()) {
                MataKuliah::create($matkul);
            }
        }
    }
}