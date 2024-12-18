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
       // Get all mata kuliahs
       $mataKuliahs = MataKuliah::all();

       if ($mataKuliahs->count() < 3) {
           $this->command->error('Not enough MataKuliah entries in the database. At least 3 are required.');
           return;
       }

       // Get all users
       $users = User::all();

       foreach ($users as $user) {
           // Randomly pick exactly 3 mata kuliahs
           $selectedMataKuliahs = $mataKuliahs->random(3);

           foreach ($selectedMataKuliahs as $mataKuliah) {
               MataKuliahPilihan::create([
                   'user_id' => $user->user_id,
                   'mata_kuliah_id' => $mataKuliah->mata_kuliah_id,
                   'pilihan_status' => ['approve', 'rejected', 'waiting'][array_rand(['approve', 'rejected', 'waiting'])],
               ]);
           }
       }
   }
}
