<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliahDosen>
 */
class MataKuliahDosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dosen_id' => Dosen::inRandomOrder()->first()->dosen_id,
            'mata_kuliah_id' => MataKuliah::inRandomOrder()->first()->mata_kuliah_id,
        
        ];
    }
}
