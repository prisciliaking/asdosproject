<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KelasMataKuliah>
 */
class KelasMataKuliahFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kelas_name' => $this->faker->unique()->word(),
            'mata_kuliah_hari' => $this->faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']),
            'mata_kuliah_jam' => $this->faker->time('H:i'),
            'whats_app_link' => $this->faker->optional()->url(),
            'kelas_semester' => $this->faker->numberBetween(1, 8),
            'dosen_id' => Dosen::inRandomOrder()->first()->dosen_id,
            'matkul_id' => MataKuliah::inRandomOrder()->first()->matkul_id,
        ];
    }
}
