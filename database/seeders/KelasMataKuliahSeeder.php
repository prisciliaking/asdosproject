<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KelasMataKuliah;

class KelasMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KelasMataKuliah::factory()->count(15)->create();
    }
}