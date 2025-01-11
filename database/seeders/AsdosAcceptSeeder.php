<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsdosAccept;

class AsdosAcceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AsdosAccept::factory()->count(50)->create();
    }
}