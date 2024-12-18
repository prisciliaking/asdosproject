<?php

namespace Database\Seeders;

use App\Models\MataKuliahDosen;
use Illuminate\Database\Seeder;

class MataKuliahDosenSeeder extends Seeder
{
    public function run(): void
    {
        // Predefined Dosen MataKuliah data
        $matakuliahDosens = [
            ['dosen_id' => 1, 'mata_kuliah_id' => 1],
            ['dosen_id' => 6, 'mata_kuliah_id' => 1],
            ['dosen_id' => 8, 'mata_kuliah_id' => 2],
            ['dosen_id' => 7, 'mata_kuliah_id' => 3],
            ['dosen_id' => 10, 'mata_kuliah_id' => 4],
            ['dosen_id' => 2, 'mata_kuliah_id' => 5],
            ['dosen_id' => 5, 'mata_kuliah_id' => 5],
            ['dosen_id' => 1, 'mata_kuliah_id' => 6],
            ['dosen_id' => 8, 'mata_kuliah_id' => 6],
            ['dosen_id' => 9, 'mata_kuliah_id' => 7],
            ['dosen_id' => 1, 'mata_kuliah_id' => 7],
            ['dosen_id' => 10, 'mata_kuliah_id' => 8],
            ['dosen_id' => 2, 'mata_kuliah_id' => 9],
            ['dosen_id' => 9, 'mata_kuliah_id' => 10],
            ['dosen_id' => 4, 'mata_kuliah_id' => 11],
            ['dosen_id' => 3, 'mata_kuliah_id' => 12],
            ['dosen_id' => 5, 'mata_kuliah_id' => 13],
            ['dosen_id' => 7, 'mata_kuliah_id' => 13],
            ['dosen_id' => 4, 'mata_kuliah_id' => 14],
            ['dosen_id' => 3, 'mata_kuliah_id' => 15],
            ['dosen_id' => 5, 'mata_kuliah_id' => 16],
        ];

        // Insert Dosen MataKuliah data without duplicates
        foreach ($matakuliahDosens as $dmk) {
            MataKuliahDosen::firstOrCreate([
                'dosen_id' => $dmk['dosen_id'],
                'mata_kuliah_id' => $dmk['mata_kuliah_id'],
            ]);
        }
    }

    // public function run(): void
    // {
    //     // Ensure there are MataKuliah and Dosen records available
    //     if (MataKuliah::count() === 0 || Dosen::count() === 0) {
    //         $this->command->info('No MataKuliah or Dosen records found. Please seed MataKuliah and Dosen first.');
    //         return;
    //     }

    //     // Create 20 MataKuliahDosen entries
    //     MataKuliahDosen::factory()->count(10)->create();
    // }
}
