<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthLevelsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VehicleMakesSeeder::class);
        $this->call(PartsSeeder::class);
        $this->call(CarPartsSeeder::class);
    }
}
