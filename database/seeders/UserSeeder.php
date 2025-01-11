<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(50)->create();
        $users = [
            ['user_name' => 'Priscilia King', 'user_nim' => '00001', 'user_email' => 'pchandra@student.com', 'user_password' => bcrypt('password1'), 'image' => 'image1', 'role_id' => 2],
            ['user_name' => 'Rachelle Love', 'user_nim' => '00002', 'user_email' => 'rtjandra@student.com', 'user_password' => bcrypt('password2'), 'image' => 'image2', 'role_id' => 2],
            ['user_name' => 'John Doe', 'user_nim' => '00003', 'user_email' => 'john.doe@student.com', 'user_password' => bcrypt('password3'), 'image' => 'image3', 'role_id' => 1],
            ['user_name' => 'Jane Smith', 'user_nim' => '00004', 'user_email' => 'jane.smith@student.com', 'user_password' => bcrypt('password4'), 'image' => 'image4', 'role_id' => 1],
            ['user_name' => 'Alice Johnson', 'user_nim' => '00005', 'user_email' => 'alice.johnson@student.com', 'user_password' => bcrypt('password5'), 'image' => 'image5', 'role_id' => 1],
            ['user_name' => 'Bob Brown', 'user_nim' => '00006', 'user_email' => 'bob.brown@student.com', 'user_password' => bcrypt('password6'), 'image' => 'image6', 'role_id' => 1],
            ['user_name' => 'Charlie Davis', 'user_nim' => '00007', 'user_email' => 'charlie.davis@student.com', 'user_password' => bcrypt('password7'), 'image' => 'image7', 'role_id' => 1],
            ['user_name' => 'Emily Evans', 'user_nim' => '00008', 'user_email' => 'emily.evans@student.com', 'user_password' => bcrypt('password8'), 'image' => 'image8', 'role_id' => 1],
            ['user_name' => 'Frank Green', 'user_nim' => '00009', 'user_email' => 'frank.green@student.com', 'user_password' => bcrypt('password9'), 'image' => 'image9', 'role_id' => 1],
            ['user_name' => 'Grace Hall', 'user_nim' => '00010', 'user_email' => 'grace.hall@student.com', 'user_password' => bcrypt('password10'), 'image' => 'image10', 'role_id' => 1],
            ['user_name' => 'Henry King', 'user_nim' => '00011', 'user_email' => 'henry.king@student.com', 'user_password' => bcrypt('password11'), 'image' => 'image11', 'role_id' => 1],
            ['user_name' => 'Isabella Lee', 'user_nim' => '00012', 'user_email' => 'isabella.lee@student.com', 'user_password' => bcrypt('password12'), 'image' => 'image12', 'role_id' => 1],
            ['user_name' => 'Jack Wilson', 'user_nim' => '00013', 'user_email' => 'jack.wilson@student.com', 'user_password' => bcrypt('password13'), 'image' => 'image13', 'role_id' => 1],
            ['user_name' => 'Karen White', 'user_nim' => '00014', 'user_email' => 'karen.white@student.com', 'user_password' => bcrypt('password14'), 'image' => 'image14', 'role_id' => 1],
            ['user_name' => 'Liam Scott', 'user_nim' => '00015', 'user_email' => 'liam.scott@student.com', 'user_password' => bcrypt('password15'), 'image' => 'image15', 'role_id' => 1],
            ['user_name' => 'Mia Taylor', 'user_nim' => '00016', 'user_email' => 'mia.taylor@student.com', 'user_password' => bcrypt('password16'), 'image' => 'image16', 'role_id' => 1],
            ['user_name' => 'Noah Adams', 'user_nim' => '00017', 'user_email' => 'noah.adams@student.com', 'user_password' => bcrypt('password17'), 'image' => 'image17', 'role_id' => 1],
            ['user_name' => 'Olivia Thomas', 'user_nim' => '00018', 'user_email' => 'olivia.thomas@student.com', 'user_password' => bcrypt('password18'), 'image' => 'image18', 'role_id' => 1],
            ['user_name' => 'Paul Harris', 'user_nim' => '00019', 'user_email' => 'paul.harris@student.com', 'user_password' => bcrypt('password19'), 'image' => 'image19', 'role_id' => 1],
            ['user_name' => 'Quinn Brown', 'user_nim' => '00020', 'user_email' => 'quinn.brown@student.com', 'user_password' => bcrypt('password20'), 'image' => 'image20', 'role_id' => 1],
            ['user_name' => 'Ryan Carter', 'user_nim' => '00021', 'user_email' => 'ryan.carter@student.com', 'user_password' => bcrypt('password21'), 'image' => 'image21', 'role_id' => 1],
            ['user_name' => 'Sophia Martinez', 'user_nim' => '00022', 'user_email' => 'sophia.martinez@student.com', 'user_password' => bcrypt('password22'), 'image' => 'image22', 'role_id' => 1],
            ['user_name' => 'Ethan Anderson', 'user_nim' => '00023', 'user_email' => 'ethan.anderson@student.com', 'user_password' => bcrypt('password23'), 'image' => 'image23', 'role_id' => 1],
            ['user_name' => 'Ava Walker', 'user_nim' => '00024', 'user_email' => 'ava.walker@student.com', 'user_password' => bcrypt('password24'), 'image' => 'image24', 'role_id' => 1],
            ['user_name' => 'Benjamin Wright', 'user_nim' => '00025', 'user_email' => 'benjamin.wright@student.com', 'user_password' => bcrypt('password25'), 'image' => 'image25', 'role_id' => 1],
            ['user_name' => 'Chloe Robinson', 'user_nim' => '00026', 'user_email' => 'chloe.robinson@student.com', 'user_password' => bcrypt('password26'), 'image' => 'image26', 'role_id' => 1],
            ['user_name' => 'Daniel Cooper', 'user_nim' => '00027', 'user_email' => 'daniel.cooper@student.com', 'user_password' => bcrypt('password27'), 'image' => 'image27', 'role_id' => 1],
            ['user_name' => 'Ella Lewis', 'user_nim' => '00028', 'user_email' => 'ella.lewis@student.com', 'user_password' => bcrypt('password28'), 'image' => 'image28', 'role_id' => 1],
            ['user_name' => 'Fiona Mitchell', 'user_nim' => '00029', 'user_email' => 'fiona.mitchell@student.com', 'user_password' => bcrypt('password29'), 'image' => 'image29', 'role_id' => 1],
            ['user_name' => 'Gabriel Nelson', 'user_nim' => '00030', 'user_email' => 'gabriel.nelson@student.com', 'user_password' => bcrypt('password30'), 'image' => 'image30', 'role_id' => 1],
        ];

        foreach ($users as $user) {
            if (!User::where('user_email', $user['user_email'])->orWhere('user_nim', $user['user_nim'])->exists()) {
                User::create($user);
            }
        }
    }
}
