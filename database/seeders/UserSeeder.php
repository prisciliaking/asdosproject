<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Predefined user data
        $users = [
            ['user_name' => 'Priscila King', 'user_email' => 'pchandra@student.com', 'user_nim' => '00001', 'role_id' => 2],
            ['user_name' => 'Rachelle Love', 'user_email' => 'rtjandra@student.com', 'user_nim' => '00002', 'role_id' => 2],
            ['user_name' => 'John Doe', 'user_email' => 'john.doe@student.com', 'user_nim' => '00003', 'role_id' => 1],
            ['user_name' => 'Jane Smith', 'user_email' => 'jane.smith@student.com', 'user_nim' => '00004', 'role_id' => 1],
            ['user_name' => 'Alice Johnson', 'user_email' => 'alice.johnson@student.com', 'user_nim' => '00005', 'role_id' => 1],
            ['user_name' => 'Bob Brown', 'user_email' => 'bob.brown@student.com', 'user_nim' => '00006', 'role_id' => 1],
            ['user_name' => 'Charlie Davis', 'user_email' => 'charlie.davis@student.com', 'user_nim' => '00007', 'role_id' => 1],
            ['user_name' => 'Emily Evans', 'user_email' => 'emily.evans@student.com', 'user_nim' => '00008', 'role_id' => 1],
            ['user_name' => 'Frank Green', 'user_email' => 'frank.green@student.com', 'user_nim' => '00009', 'role_id' => 1],
            ['user_name' => 'Grace Hall', 'user_email' => 'grace.hall@student.com', 'user_nim' => '00010', 'role_id' => 1],
            ['user_name' => 'Henry King', 'user_email' => 'henry.king@student.com', 'user_nim' => '00011', 'role_id' => 1],
            ['user_name' => 'Isabella Lee', 'user_email' => 'isabella.lee@student.com', 'user_nim' => '00012', 'role_id' => 1],
            ['user_name' => 'Jack Wilson', 'user_email' => 'jack.wilson@student.com', 'user_nim' => '00013', 'role_id' => 1],
            ['user_name' => 'Karen White', 'user_email' => 'karen.white@student.com', 'user_nim' => '00014', 'role_id' => 1],
            ['user_name' => 'Liam Scott', 'user_email' => 'liam.scott@student.com', 'user_nim' => '00015', 'role_id' => 1],
            ['user_name' => 'Mia Taylor', 'user_email' => 'mia.taylor@student.com', 'user_nim' => '00016', 'role_id' => 1],
            ['user_name' => 'Noah Adams', 'user_email' => 'noah.adams@student.com', 'user_nim' => '00017', 'role_id' => 1],
            ['user_name' => 'Olivia Thomas', 'user_email' => 'olivia.thomas@student.com', 'user_nim' => '00018', 'role_id' => 1],
            ['user_name' => 'Paul Harris', 'user_email' => 'paul.harris@student.com', 'user_nim' => '00019', 'role_id' => 1],
            ['user_name' => 'Quinn Brown', 'user_email' => 'quinn.brown@student.com', 'user_nim' => '00020', 'role_id' => 1],
        ];

        // Insert users if they don't already exist
        foreach ($users as $user) {
            User::firstOrCreate(
                ['user_email' => $user['user_email']], // Check by user_email
                [
                    'user_name' => $user['user_name'],
                    'user_nim'  => $user['user_nim'],
                    'role_id'   => $user['role_id'],
                ]
            );
        }
    }
}
