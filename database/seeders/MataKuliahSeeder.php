<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        // Predefined MataKuliah data
        $mataKuliah = [
            ['mata_kuliah_nama' => 'Algorithm and Programming', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Information Communication and Technology', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Computer Organization and Architecture', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Algebra', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Object Oriented Programming', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Web Programming', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Database', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Calculus', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Visual Programming', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Web Development', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Discrete Mathematic', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Operation System', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Digital Entrepreneurship Innovation', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Statistic', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Civics', 'is_deleted' => 0],
            ['mata_kuliah_nama' => 'Big Data', 'is_deleted' => 0],
        ];

        // Insert MataKuliah data without duplicates
        foreach ($mataKuliah as $mk) {
            MataKuliah::firstOrCreate(
                ['mata_kuliah_nama' => $mk['mata_kuliah_nama']],
                ['is_deleted' => $mk['is_deleted']]
            );
        }

        MataKuliah::factory(30)->create();
    }
}
