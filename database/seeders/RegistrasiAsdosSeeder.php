<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegistrasiAsdos;

class RegistrasiAsdosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 records using the factory
        RegistrasiAsdos::factory()->count(10)->create();
    }
}