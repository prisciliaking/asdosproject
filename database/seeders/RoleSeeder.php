<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['mahasiswa', 'admin'];
        foreach ($roles as $role_name) {
            Role::firstOrCreate(['role_name' => $role_name]);
        }

        
    }
}
