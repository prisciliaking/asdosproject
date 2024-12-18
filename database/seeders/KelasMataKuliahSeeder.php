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
        // Create 10 KelasMataKuliah entries
        KelasMataKuliah::factory()->count(10)->create();
    }
}
