<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegistrasiAsdos;

class RegistrasiAsdosSeeder extends Seeder
{
    public function run(): void
    {
        $registrasiAsdos = [
            ['user_id' => 3, 'matkul_id' => 1, 'status' => 'approve'],
            ['user_id' => 3, 'matkul_id' => 2, 'status' => 'approve'],
            ['user_id' => 3, 'matkul_id' => 3, 'status' => 'rejected'],
            ['user_id' => 4, 'matkul_id' => 4, 'status' => 'approve'],
            ['user_id' => 4, 'matkul_id' => 9, 'status' => 'approve'],
            ['user_id' => 4, 'matkul_id' => 10, 'status' => 'rejected'],
            ['user_id' => 5, 'matkul_id' => 11, 'status' => 'approve'],
            ['user_id' => 5, 'matkul_id' => 12, 'status' => 'approve'],
            ['user_id' => 5, 'matkul_id' => 1, 'status' => 'rejected'],
            ['user_id' => 6, 'matkul_id' => 2, 'status' => 'approve'],
            ['user_id' => 6, 'matkul_id' => 3, 'status' => 'approve'],
            ['user_id' => 6, 'matkul_id' => 4, 'status' => 'rejected'],
            ['user_id' => 7, 'matkul_id' => 9, 'status' => 'approve'],
            ['user_id' => 7, 'matkul_id' => 10, 'status' => 'approve'],
            ['user_id' => 7, 'matkul_id' => 11, 'status' => 'rejected'],
            ['user_id' => 8, 'matkul_id' => 12, 'status' => 'approve'],
            ['user_id' => 8, 'matkul_id' => 1, 'status' => 'rejected'],
            ['user_id' => 8, 'matkul_id' => 2, 'status' => 'approve'],
            ['user_id' => 9, 'matkul_id' => 3, 'status' => 'approve'],
            ['user_id' => 9, 'matkul_id' => 4, 'status' => 'rejected'],
            ['user_id' => 9, 'matkul_id' => 9, 'status' => 'approve'],
            ['user_id' => 10, 'matkul_id' => 10, 'status' => 'approve'],
            ['user_id' => 10, 'matkul_id' => 11, 'status' => 'approve'],
            ['user_id' => 10, 'matkul_id' => 12, 'status' => 'rejected'],
            ['user_id' => 11, 'matkul_id' => 1, 'status' => 'approve'],
            ['user_id' => 11, 'matkul_id' => 2, 'status' => 'approve'],
            ['user_id' => 11, 'matkul_id' => 3, 'status' => 'rejected'],
            ['user_id' => 12, 'matkul_id' => 4, 'status' => 'approve'],
            ['user_id' => 12, 'matkul_id' => 9, 'status' => 'approve'],
            ['user_id' => 12, 'matkul_id' => 10, 'status' => 'rejected'],
            ['user_id' => 13, 'matkul_id' => 11, 'status' => 'approve'],
            ['user_id' => 13, 'matkul_id' => 12, 'status' => 'approve'],
            ['user_id' => 13, 'matkul_id' => 1, 'status' => 'rejected'],
            ['user_id' => 14, 'matkul_id' => 2, 'status' => 'approve'],
            ['user_id' => 14, 'matkul_id' => 3, 'status' => 'rejected'],
            ['user_id' => 14, 'matkul_id' => 4, 'status' => 'approve'],
            ['user_id' => 15, 'matkul_id' => 9, 'status' => 'approve'],
            ['user_id' => 15, 'matkul_id' => 10, 'status' => 'approve'],
            ['user_id' => 15, 'matkul_id' => 11, 'status' => 'rejected'],
            ['user_id' => 16, 'matkul_id' => 12, 'status' => 'approve'],
            ['user_id' => 16, 'matkul_id' => 1, 'status' => 'approve'],
            ['user_id' => 16, 'matkul_id' => 2, 'status' => 'rejected'],
            ['user_id' => 17, 'matkul_id' => 3, 'status' => 'approve'],
            ['user_id' => 17, 'matkul_id' => 4, 'status' => 'approve'],
            ['user_id' => 17, 'matkul_id' => 9, 'status' => 'rejected'],
            ['user_id' => 18, 'matkul_id' => 10, 'status' => 'approve'],
            ['user_id' => 18, 'matkul_id' => 11, 'status' => 'approve'],
            ['user_id' => 18, 'matkul_id' => 12, 'status' => 'rejected'],
            ['user_id' => 19, 'matkul_id' => 1, 'status' => 'approve'],
            ['user_id' => 19, 'matkul_id' => 2, 'status' => 'approve'],
            ['user_id' => 19, 'matkul_id' => 3, 'status' => 'rejected'],
            ['user_id' => 20, 'matkul_id' => 4, 'status' => 'approve'],
            ['user_id' => 20, 'matkul_id' => 9, 'status' => 'approve'],
            ['user_id' => 20, 'matkul_id' => 10, 'status' => 'rejected'],
            ['user_id' => 21, 'matkul_id' => 11, 'status' => 'rejected'],
            ['user_id' => 21, 'matkul_id' => 12, 'status' => 'approve'],
            ['user_id' => 21, 'matkul_id' => 1, 'status' => 'approve'],
            ['user_id' => 22, 'matkul_id' => 2, 'status' => 'waiting'],
            ['user_id' => 22, 'matkul_id' => 3, 'status' => 'waiting'],
            ['user_id' => 22, 'matkul_id' => 4, 'status' => 'waiting'],
            ['user_id' => 23, 'matkul_id' => 9, 'status' => 'waiting'],
            ['user_id' => 23, 'matkul_id' => 10, 'status' => 'waiting'],
            ['user_id' => 23, 'matkul_id' => 11, 'status' => 'waiting'],
            ['user_id' => 24, 'matkul_id' => 12, 'status' => 'waiting'],
            ['user_id' => 24, 'matkul_id' => 1, 'status' => 'waiting'],
            ['user_id' => 24, 'matkul_id' => 2, 'status' => 'waiting'],
            ['user_id' => 25, 'matkul_id' => 3, 'status' => 'waiting'],
            ['user_id' => 25, 'matkul_id' => 4, 'status' => 'waiting'],
            ['user_id' => 25, 'matkul_id' => 9, 'status' => 'waiting'],
            ['user_id' => 26, 'matkul_id' => 10, 'status' => 'waiting'],
            ['user_id' => 26, 'matkul_id' => 11, 'status' => 'waiting'],
            ['user_id' => 26, 'matkul_id' => 12, 'status' => 'waiting'],
            ['user_id' => 27, 'matkul_id' => 1, 'status' => 'waiting'],
            ['user_id' => 27, 'matkul_id' => 2, 'status' => 'waiting'],
            ['user_id' => 27, 'matkul_id' => 3, 'status' => 'waiting'],
            ['user_id' => 28, 'matkul_id' => 4, 'status' => 'waiting'],
            ['user_id' => 28, 'matkul_id' => 9, 'status' => 'waiting'],
            ['user_id' => 28, 'matkul_id' => 10, 'status' => 'waiting'],
            ['user_id' => 29, 'matkul_id' => 11, 'status' => 'waiting'],
            ['user_id' => 29, 'matkul_id' => 12, 'status' => 'waiting'],
            ['user_id' => 29, 'matkul_id' => 1, 'status' => 'waiting'],
            ['user_id' => 30, 'matkul_id' => 2, 'status' => 'waiting'],
            ['user_id' => 30, 'matkul_id' => 3, 'status' => 'waiting'],
            ['user_id' => 30, 'matkul_id' => 4, 'status' => 'waiting'],
        ];

        foreach ($registrasiAsdos as $regis) {
            if (!RegistrasiAsdos::where('user_id', $regis['user_id'])->where('matkul_id', $regis['matkul_id'])->where('status', $regis['status'])->exists()) {
                RegistrasiAsdos::create($regis);
            }
        }
    }
}