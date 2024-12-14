<?php

namespace Database\Seeders;

use App\Models\KelasMataKuliah;
use App\Models\MataKuliahDosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there are MataKuliahDosen records available
        if (MataKuliahDosen::count() === 0) {
            $this->command->info('No MataKuliahDosen records found. Please seed MataKuliahDosen first.');
            return;
        }

        // Create 10 KelasMataKuliah entries
        KelasMataKuliah::factory()->count(10)->create();
    }
}
