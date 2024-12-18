<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // seed role e
        $this->call(RoleSeeder::class);

        // Seed the users and associate them with roles
        User::factory(20)->create()->each(function ($user) {
            // Randomly assign a role to each user
            $user->role()->associate(Role::inRandomOrder()->first());
            $user->save();
        });

        //seed dosen
        $this->call(DosenSeeder::class);

        // seed mata kuliah
        $this->call(MataKuliahSeeder::class);

        // seed mata kuliah pilihan mahasiswa
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MataKuliahSeeder::class,
            MataKuliahPilihanSeeder::class,
        ]);

        //seed mata kuliah accept mahasiswa
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MataKuliahSeeder::class,
            MataKuliahPilihanSeeder::class,
            MataKuliahAcceptSeeder::class, // Add this line
        ]);

        //seed nama dosen
        $this->call(MataKuliahDosenSeeder::class);

        //seed kelas e
        $this->call(KelasMataKuliahSeeder::class);
    }
}
