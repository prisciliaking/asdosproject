<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mata_kuliah_nama' => $this->faker->words(3, true), // 3 kata maksimal
            'is_deleted' => $this->faker->boolean(10), // 10% chance of being deleted

        ];
    }
}
