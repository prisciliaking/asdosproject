<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DosenSeeder;
use Database\Seeders\MataKuliahSeeder;
use Database\Seeders\KelasMataKuliahSeeder;
use Database\Seeders\RegistrasiAsdosSeeder;
use Database\Seeders\AsdosAcceptSeeder;

class DatabaseSeeder extends Seeder {
    public function run(): void{
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            DosenSeeder::class,
            MataKuliahSeeder::class,
            KelasMataKuliahSeeder::class,
            RegistrasiAsdosSeeder::class,
            AsdosAcceptSeeder::class,
        ]);
    }
}
