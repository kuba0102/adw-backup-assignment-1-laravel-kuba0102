<?php

use Illuminate\Database\Seeder;

class VehicleMakesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_makes')->insert([
            'vehicle_id' => '1',
            'vehicle_vehicle' => 'BMW',
            'vehicle_model' => '1 Series',
        ]);

        DB::table('vehicle_makes')->insert([
            'vehicle_id' => '2',
            'vehicle_vehicle' => 'Mazda',
            'vehicle_model' => 'MX-5',
        ]);

        DB::table('vehicle_makes')->insert([
            'vehicle_id' => '3',
            'vehicle_vehicle' => 'Ford',
            'vehicle_model' => 'Focus',
        ]);

        DB::table('vehicle_makes')->insert([
            'vehicle_id' => '4',
            'vehicle_vehicle' => 'Nissan',
            'vehicle_model' => 'Skyline',
        ]);

        DB::table('vehicle_makes')->insert([
            'vehicle_id' => '5',
            'vehicle_vehicle' => 'Toyota',
            'vehicle_model' => 'Corolla',
        ]);
    }
}
