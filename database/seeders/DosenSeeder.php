<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $dosens = [
            ['dosen_name' => 'Dipl.Inf.Laura Mahendratta'],
            ['dosen_name' => 'Evan Tanuwijaya,S.Kom.,M.Kom.'],
            ['dosen_name' => 'Ir.Daniel Martolomanggolo Wonohadidjojo, M.Eng.'],
            ['dosen_name' => 'Christopher Andreas, S.Stat.,M.Stat.'],
            ['dosen_name' => 'Caecilia Citra Lestari,S.Kom.,M.Kom'],
            ['dosen_name' => 'Elizabeth Nathania Witanto,S.Kom.,M.Sc.,Ph.D'],
            ['dosen_name' => 'Yuwono Marta Dinata, S.T., M.Eng.'],
            ['dosen_name' => 'Stephanus Eko Wahyudi, S.T.,M.Mm.'],
            ['dosen_name' => 'Dr.Andreas Jodhinata, S.Kom.,M.Kom.'],
            ['dosen_name' => 'Dyas Kristanto'],
        ];

        foreach ($dosens as $dosen) {
            if (!Dosen::where('dosen_name', $dosen['dosen_name'])->exists()) {
                Dosen::create($dosen);
            }
        }
    }
}
