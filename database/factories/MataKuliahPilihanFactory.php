<?php

namespace Database\Factories;

use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliahPilihan>
 */
class MataKuliahPilihanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->user_id,
            'mata_kuliah_id' => MataKuliah::inRandomOrder()->first()->mata_kuliah_id,
            'pilihan_status' => $this->faker->randomElement(['approve', 'rejected', 'waiting']),

        ];
    }
}
