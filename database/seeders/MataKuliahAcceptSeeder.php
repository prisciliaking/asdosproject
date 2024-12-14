<?php

namespace Database\Seeders;

use App\Models\MataKuliahAccept;
use App\Models\MataKuliahPilihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataKuliahAcceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
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
