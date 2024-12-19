<?php

namespace Database\Seeders;

use App\Models\MataKuliahAccept;
use App\Models\MataKuliahPilihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataKuliahAcceptSeeder extends Seeder
{
    public function run(): void
    {
        // Get all mata_kuliah_pilihans with 'approve' status
        $approvedPilihans = MataKuliahPilihan::where('pilihan_status', 'approve')->get();

        foreach ($approvedPilihans as $pilihan) {
            MataKuliahAccept::create([
                'user_id' => $pilihan->user_id,
                'mata_kuliah_id' => $pilihan->mata_kuliah_id,
            ]);
        }
    }
}

// public function run(): void
    // {
    //     // Predefined Mata Kuliah Accept data
    //     $mataKuliahAccept = [
    //         ['user_id' => 3,  'mata_kuliah_id' => 1],
    //         ['user_id' => 3,  'mata_kuliah_id' => 2],
    //         ['user_id' => 4,  'mata_kuliah_id' => 4],
    //         ['user_id' => 4,  'mata_kuliah_id' => 5],
    //         ['user_id' => 5,  'mata_kuliah_id' => 7],
    //         ['user_id' => 5,  'mata_kuliah_id' => 8],
    //         ['user_id' => 6,  'mata_kuliah_id' => 10],
    //         ['user_id' => 6,  'mata_kuliah_id' => 11],
    //         ['user_id' => 7,  'mata_kuliah_id' => 13],
    //         ['user_id' => 7,  'mata_kuliah_id' => 14],
    //         ['user_id' => 8,  'mata_kuliah_id' => 16],
    //         ['user_id' => 8,  'mata_kuliah_id' => 2],
    //         ['user_id' => 9,  'mata_kuliah_id' => 3],
    //         ['user_id' => 9,  'mata_kuliah_id' => 5],
    //         ['user_id' => 10, 'mata_kuliah_id' => 6],
    //         ['user_id' => 10, 'mata_kuliah_id' => 7],
    //         ['user_id' => 11, 'mata_kuliah_id' => 9],
    //         ['user_id' => 11, 'mata_kuliah_id' => 10],
    //         ['user_id' => 12, 'mata_kuliah_id' => 12],
    //         ['user_id' => 12, 'mata_kuliah_id' => 13],
    //         ['user_id' => 13, 'mata_kuliah_id' => 15],
    //         ['user_id' => 13, 'mata_kuliah_id' => 16],
    //         ['user_id' => 14, 'mata_kuliah_id' => 2],
    //         ['user_id' => 14, 'mata_kuliah_id' => 4],
    //         ['user_id' => 15, 'mata_kuliah_id' => 5],
    //         ['user_id' => 15, 'mata_kuliah_id' => 6],
    //         ['user_id' => 16, 'mata_kuliah_id' => 8],
    //         ['user_id' => 16, 'mata_kuliah_id' => 9],
    //         ['user_id' => 17, 'mata_kuliah_id' => 11],
    //         ['user_id' => 17, 'mata_kuliah_id' => 12],
    //         ['user_id' => 18, 'mata_kuliah_id' => 14],
    //         ['user_id' => 18, 'mata_kuliah_id' => 15],
    //         ['user_id' => 19, 'mata_kuliah_id' => 1],
    //         ['user_id' => 19, 'mata_kuliah_id' => 2],
    //         ['user_id' => 20, 'mata_kuliah_id' => 4],
    //         ['user_id' => 20, 'mata_kuliah_id' => 5],
    //         ['user_id' => 21, 'mata_kuliah_id' => 7],
    //         ['user_id' => 21, 'mata_kuliah_id' => 8],
    //     ];

    //     // Insert Mata Kuliah Accept data
    //     foreach ($mataKuliahAccept as $accept) {
    //         MataKuliahAccept::firstOrCreate(
    //             ['user_id' => $accept['user_id'], 'mata_kuliah_id' => $accept['mata_kuliah_id']]
    //         );
    //     }
    // }
