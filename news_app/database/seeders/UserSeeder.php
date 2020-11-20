<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            \DB::table('users')->insert([
                'name' => 'User-' . $i,
                'email' => 'user-'.$i.'@example.com',
                'display_name' => 'user_name' . $i,
				'password' => bcrypt('password-' . $i),
            ]);
        }
    }
}
