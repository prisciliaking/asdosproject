<?php

namespace Database\Factories;
use App\Models\RegistrasiAsdos;
use App\Models\User;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrasiAsdosFactory extends Factory
{
    protected $model = RegistrasiAsdos::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'matkul_id' => MataKuliah::factory(),
            'status' => $this->faker->randomElement(['waiting', 'approve', 'reject']),
        ];
    }
}