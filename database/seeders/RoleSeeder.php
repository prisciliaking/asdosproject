<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['mahasiswa', 'admin'];
        foreach ($roles as $role_name) {
            Role::firstOrCreate(['role_name' => $role_name]);
        }
    }
}
