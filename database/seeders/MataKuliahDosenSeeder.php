<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\MataKuliahDosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataKuliahDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there are MataKuliah and Dosen records available
        if (MataKuliah::count() === 0 || Dosen::count() === 0) {
            $this->command->info('No MataKuliah or Dosen records found. Please seed MataKuliah and Dosen first.');
            return;
        }

        // Create 20 MataKuliahDosen entries
        MataKuliahDosen::factory()->count(10)->create();
    }
}
