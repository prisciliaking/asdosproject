<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use App\Models\MataKuliahPilihan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataKuliahPilihanSeeder extends Seeder
{
    public function run(): void
    {
        // Predefined Mata Kuliah Pilihan data
        $mataKuliahPilihan = [
            ['user_id' => 3,  'mata_kuliah_id' => 1,  'pilihan_status' => 'approve'],
            ['user_id' => 3,  'mata_kuliah_id' => 2,  'pilihan_status' => 'approve'],
            ['user_id' => 3,  'mata_kuliah_id' => 3,  'pilihan_status' => 'rejected'],
            ['user_id' => 4,  'mata_kuliah_id' => 4,  'pilihan_status' => 'approve'],
            ['user_id' => 4,  'mata_kuliah_id' => 5,  'pilihan_status' => 'approve'],
            ['user_id' => 4,  'mata_kuliah_id' => 6,  'pilihan_status' => 'rejected'],
            ['user_id' => 5,  'mata_kuliah_id' => 7,  'pilihan_status' => 'approve'],
            ['user_id' => 5,  'mata_kuliah_id' => 8,  'pilihan_status' => 'approve'],
            ['user_id' => 5,  'mata_kuliah_id' => 9,  'pilihan_status' => 'rejected'],
            ['user_id' => 6,  'mata_kuliah_id' => 10, 'pilihan_status' => 'approve'],
            ['user_id' => 6,  'mata_kuliah_id' => 11, 'pilihan_status' => 'approve'],
            ['user_id' => 7,  'mata_kuliah_id' => 12, 'pilihan_status' => 'approve'],
            ['user_id' => 7,  'mata_kuliah_id' => 13, 'pilihan_status' => 'approve'],
            ['user_id' => 7,  'mata_kuliah_id' => 14, 'pilihan_status' => 'approve'],
            ['user_id' => 8,  'mata_kuliah_id' => 15, 'pilihan_status' => 'approve'],
            ['user_id' => 8,  'mata_kuliah_id' => 16, 'pilihan_status' => 'approve'],
            ['user_id' => 8,  'mata_kuliah_id' => 1,  'pilihan_status' => 'rejected'],
            ['user_id' => 9,  'mata_kuliah_id' => 2,  'pilihan_status' => 'approve'],
            ['user_id' => 9,  'mata_kuliah_id' => 3,  'pilihan_status' => 'approve'],
            ['user_id' => 9,  'mata_kuliah_id' => 4,  'pilihan_status' => 'rejected'],
            ['user_id' => 10, 'mata_kuliah_id' => 5,  'pilihan_status' => 'approve'],
            ['user_id' => 10, 'mata_kuliah_id' => 6,  'pilihan_status' => 'approve'],
            ['user_id' => 10, 'mata_kuliah_id' => 7,  'pilihan_status' => 'approve'],
            ['user_id' => 11, 'mata_kuliah_id' => 8,  'pilihan_status' => 'rejected'],
            ['user_id' => 11, 'mata_kuliah_id' => 9,  'pilihan_status' => 'approve'],
            ['user_id' => 11, 'mata_kuliah_id' => 10, 'pilihan_status' => 'approve'],
            ['user_id' => 12, 'mata_kuliah_id' => 11, 'pilihan_status' => 'approve'],
            ['user_id' => 12, 'mata_kuliah_id' => 12, 'pilihan_status' => 'approve'],
            ['user_id' => 12, 'mata_kuliah_id' => 13, 'pilihan_status' => 'approve'],
            ['user_id' => 13, 'mata_kuliah_id' => 14, 'pilihan_status' => 'rejected'],
            ['user_id' => 13, 'mata_kuliah_id' => 15, 'pilihan_status' => 'approve'],
            ['user_id' => 14, 'mata_kuliah_id' => 16, 'pilihan_status' => 'approve'],
            ['user_id' => 14, 'mata_kuliah_id' => 1,  'pilihan_status' => 'approve'],
            ['user_id' => 15, 'mata_kuliah_id' => 2,  'pilihan_status' => 'approve'],
            ['user_id' => 15, 'mata_kuliah_id' => 3,  'pilihan_status' => 'approve'],
            ['user_id' => 16, 'mata_kuliah_id' => 4,  'pilihan_status' => 'approve'],
            ['user_id' => 16, 'mata_kuliah_id' => 5,  'pilihan_status' => 'approve'],
            ['user_id' => 16, 'mata_kuliah_id' => 6,  'pilihan_status' => 'approve'],
            ['user_id' => 17, 'mata_kuliah_id' => 7,  'pilihan_status' => 'rejected'],
            ['user_id' => 17, 'mata_kuliah_id' => 8,  'pilihan_status' => 'approve'],
            ['user_id' => 17, 'mata_kuliah_id' => 9,  'pilihan_status' => 'approve'],
            ['user_id' => 18, 'mata_kuliah_id' => 10, 'pilihan_status' => 'rejected'],
            ['user_id' => 18, 'mata_kuliah_id' => 11, 'pilihan_status' => 'approve'],
            ['user_id' => 18, 'mata_kuliah_id' => 12, 'pilihan_status' => 'approve'],
            ['user_id' => 19, 'mata_kuliah_id' => 13, 'pilihan_status' => 'approve'],
            ['user_id' => 19, 'mata_kuliah_id' => 14, 'pilihan_status' => 'approve'],
        ];

        // Insert Mata Kuliah Pilihan data
        foreach ($mataKuliahPilihan as $pilihan) {
            MataKuliahPilihan::firstOrCreate(
                ['user_id' => $pilihan['user_id'], 'mata_kuliah_id' => $pilihan['mata_kuliah_id']],
                ['pilihan_status' => $pilihan['pilihan_status']]
            );
        }

        // Dynamically generate Mata Kuliah Pilihan for each user
        $users = User::all();
        $mataKuliahs = MataKuliah::all();

        foreach ($users as $user) {
            // Assign exactly 3 random Mata Kuliah IDs for each user
            $randomChoices = $mataKuliahs->random(3);

            foreach ($randomChoices as $mataKuliah) {
                MataKuliahPilihan::firstOrCreate(
                    ['user_id' => $user->user_id, 'mata_kuliah_id' => $mataKuliah->mata_kuliah_id],
                    ['pilihan_status' => fake()->randomElement(['approve', 'rejected', 'waiting'])]
                );
            }
        }
    }
}

//     public function run(): void
    //     {
    //        // Get all mata kuliahs
    //        $mataKuliahs = MataKuliah::all();

    //        if ($mataKuliahs->count() < 3) {
    //            $this->command->error('Not enough MataKuliah entries in the database. At least 3 are required.');
    //            return;
    //        }

    //        // Get all users
    //        $users = User::all();

    //        foreach ($users as $user) {
    //            // Randomly pick exactly 3 mata kuliahs
    //            $selectedMataKuliahs = $mataKuliahs->random(3);

    //            foreach ($selectedMataKuliahs as $mataKuliah) {
    //                MataKuliahPilihan::create([
    //                    'user_id' => $user->user_id,
    //                    'mata_kuliah_id' => $mataKuliah->mata_kuliah_id,
    //                    'pilihan_status' => ['approve', 'rejected', 'waiting'][array_rand(['approve', 'rejected', 'waiting'])],
    //                ]);
    //            }
    //        }
    //    }
