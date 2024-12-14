<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dosen_name' => $this->faker->name(),  // Generate a random name for dosen
            'is_deleted' => $this->faker->boolean(),  // Randomly assign a boolean for is_deleted
        ];
    }
}
