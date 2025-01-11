<?php
namespace Database\Factories;

use App\Models\AsdosAccept;
use App\Models\User;
use App\Models\KelasMataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;


class AsdosAcceptFactory extends Factory
{
    protected $model = AsdosAccept::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'kelas_id' => KelasMataKuliah::factory(),
        ];
    }
}