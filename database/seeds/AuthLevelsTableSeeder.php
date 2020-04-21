<?php

use Illuminate\Database\Seeder;

class AuthLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auth_levels')->insert([
            'auth_id' => '1',
            'auth_name' => 'admin'
        ]);

        DB::table('auth_levels')->insert([
            'auth_id' => '2',
            'auth_name' => 'normal'
        ]);
    }
}
