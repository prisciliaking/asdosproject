<?php

namespace Database\Factories;

use App\Models\MataKuliahDosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KelasMataKuliah>
 */
class KelasMataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kelas_nama' => $this->faker->unique()->word(),
            'mata_kuliah_hari' => $this->faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']),
            'mata_kuliah_jam' => $this->faker->time('H:i'),
            'whats_app_link' => $this->faker->optional()->url(),
            'kelas_semester' => $this->faker->randomElement(['ganjil', 'genap']),
            'is_deleted' => false,
            'matkul_dosen_id' => MataKuliahDosen::inRandomOrder()->first()->matkul_dosen_id,
        ];
    }
}
