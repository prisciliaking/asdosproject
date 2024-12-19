<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        // Predefined Dosen data
        $dosens = [
            ['dosen_name' => 'Dipl.Inf.Laura Mahendratta', 'is_deleted' => 0],
            ['dosen_name' => 'Evan Tanwijaya,S.Kom.,M.Kom.', 'is_deleted' => 0],
            ['dosen_name' => 'Ir.Daniel Martolomanggolo Wonohadidjojo, M.Eng.', 'is_deleted' => 0],
            ['dosen_name' => 'Christopher Andreas, S.Stat.,M.Stat.', 'is_deleted' => 0],
            ['dosen_name' => 'Caecilia Citra Lestari,S.Kom.,M.Kom', 'is_deleted' => 0],
            ['dosen_name' => 'Elizabeth Nathania Witanto,S.Kom.,M.Sc.,Ph.D', 'is_deleted' => 0],
            ['dosen_name' => 'Yuwono Marta Dinata, S.T., M.Eng.', 'is_deleted' => 0],
            ['dosen_name' => 'Stephanus Eko Wahyudi, S.T.,M.Mm.', 'is_deleted' => 0],
            ['dosen_name' => 'Dr.Andreas Jodhinata, S.Kom.,M.Kom.', 'is_deleted' => 0],
            ['dosen_name' => 'Dyas Kristanto', 'is_deleted' => 0],
        ];

        // Insert Dosen data without duplicates
        foreach ($dosens as $dosen) {
            Dosen::firstOrCreate(
                ['dosen_name' => $dosen['dosen_name']], // Check for duplicates based on dosen_name
                ['is_deleted' => $dosen['is_deleted']]
            );
        }

        Dosen::factory(50)->create();
    }
}
