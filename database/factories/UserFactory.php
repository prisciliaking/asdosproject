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
        $roles = Role::all(['role_id']);

        // Randomly pick one of the roles
        $role = $roles->random();

        return [
            'user_name' => $this->faker->name(),
            'user_email' => $this->faker->unique()->safeEmail(),
            'user_nim' => $this->faker->unique()->numerify('0#####'),
            'user_password' => bcrypt('password'), // Default password
            'image' => $this->faker->imageUrl(),
            'role_id' => $role->role_id,  
        ];
    }
}

