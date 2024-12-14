<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get the 'mahasiswa' and 'admin' roles by name
        $roles = Role::whereIn('role_name', ['mahasiswa', 'admin'])->get();

        // Check if roles are available
        if ($roles->isEmpty()) {
            throw new \Exception('Roles "mahasiswa" and "admin" must be created before seeding users.');
        }

        // Randomly pick one of the roles
        $role = $roles->random();

        return [
            'user_name' => $this->faker->name(),
            'user_email' => $this->faker->unique()->safeEmail(),
            'user_nim' => $this->faker->unique()->numerify('NIM-####'),
            'role_id' => $role->role_id,  // Assign the selected role ID
        ];
    }
}
