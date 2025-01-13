<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsdosAccept;

class AsdosAcceptSeeder extends Seeder
{
    public function run(): void
    {
        $asdosAccepts = [
            ['kelas_id' => 1, 'user_id' => 3],
            ['kelas_id' => 3, 'user_id' => 3],
            ['kelas_id' => 5, 'user_id' => 4],
            ['kelas_id' => 13, 'user_id' => 4],
            ['kelas_id' => 15, 'user_id' => 5],
            ['kelas_id' => 16, 'user_id' => 5],
            ['kelas_id' => 3, 'user_id' => 6],
            ['kelas_id' => 4, 'user_id' => 6],
            ['kelas_id' => 13, 'user_id' => 7],
            ['kelas_id' => 14, 'user_id' => 7],
            ['kelas_id' => 16, 'user_id' => 8],
            ['kelas_id' => 3, 'user_id' => 8],
            ['kelas_id' => 4, 'user_id' => 9],
            ['kelas_id' => 13, 'user_id' => 9],
            ['kelas_id' => 14, 'user_id' => 10],
            ['kelas_id' => 15, 'user_id' => 10],
            ['kelas_id' => 2, 'user_id' => 11],
            ['kelas_id' => 3, 'user_id' => 11],
            ['kelas_id' => 5, 'user_id' => 12],
            ['kelas_id' => 13, 'user_id' => 12],
            ['kelas_id' => 15, 'user_id' => 13],
            ['kelas_id' => 16, 'user_id' => 13],
            ['kelas_id' => 3, 'user_id' => 14],
            ['kelas_id' => 5, 'user_id' => 14],
            ['kelas_id' => 13, 'user_id' => 15],
            ['kelas_id' => 14, 'user_id' => 15],
            ['kelas_id' => 16, 'user_id' => 16],
            ['kelas_id' => 1, 'user_id' => 16],
            ['kelas_id' => 4, 'user_id' => 17],
            ['kelas_id' => 5, 'user_id' => 17],
            ['kelas_id' => 14, 'user_id' => 18],
            ['kelas_id' => 15, 'user_id' => 18],
            ['kelas_id' => 2, 'user_id' => 19],
            ['kelas_id' => 3, 'user_id' => 19],
            ['kelas_id' => 5, 'user_id' => 20],
            ['kelas_id' => 13, 'user_id' => 20],
            ['kelas_id' => 16, 'user_id' => 21],
            ['kelas_id' => 1, 'user_id' => 21],
        ];

        foreach ($asdosAccepts as $accept) {
            if (!AsdosAccept::where('kelas_id', $accept['kelas_id'])->where('user_id', $accept['user_id'])->exists()) {
                AsdosAccept::create($accept);
            }
        }
    }
}