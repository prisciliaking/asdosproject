<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        // Fetch all roles directly from the Role model
        $roles = Role::all();

        // Check if roles are available
        if ($roles->isEmpty()) {
            throw new \Exception('Roles "mahasiswa" and "admin" must be created before seeding users.');
        }

        // Randomly pick one of the roles
        $role = $roles->random();

        return [
            'user_name' => $this->faker->name(),
            'user_email' => $this->faker->unique()->safeEmail(),
            'user_nim' => $this->faker->unique()->numerify('0#####'),
            'role_id' => $role->id,  
        ];
    }
}

