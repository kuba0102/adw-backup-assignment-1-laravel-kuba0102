<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'last_name' => str_random(10),
            'email' => 'kuba0102@gmail.com',
            'auth_id' => 1,
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'last_name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'auth_id' => 1,
            'password' => bcrypt('password'),
        ]);
    }
}
