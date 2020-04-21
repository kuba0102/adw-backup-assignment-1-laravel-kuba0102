<?php

use Illuminate\Database\Seeder;

class CarPartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Car 1
        DB::table('car_parts')->insert([
            'part_id' => '1',
            'vehicle_id' => '1',
            'price' => '120',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '2',
            'vehicle_id' => '1',
            'price' => '55',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '3',
            'vehicle_id' => '1',
            'price' => '40',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '4',
            'vehicle_id' => '1',
            'price' => '70',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '5',
            'vehicle_id' => '1',
            'price' => '60',
        ]);

        // Car 2
        DB::table('car_parts')->insert([
            'part_id' => '1',
            'vehicle_id' => '2',
            'price' => '120',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '2',
            'vehicle_id' => '2',
            'price' => '55',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '3',
            'vehicle_id' => '2',
            'price' => '40',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '4',
            'vehicle_id' => '2',
            'price' => '70',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '5',
            'vehicle_id' => '2',
            'price' => '60',
        ]);

        // Car 3
        DB::table('car_parts')->insert([
            'part_id' => '1',
            'vehicle_id' => '3',
            'price' => '120',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '2',
            'vehicle_id' => '3',
            'price' => '55',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '3',
            'vehicle_id' => '3',
            'price' => '40',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '4',
            'vehicle_id' => '3',
            'price' => '70',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '5',
            'vehicle_id' => '3',
            'price' => '60',
        ]);

        // Car 4
        DB::table('car_parts')->insert([
            'part_id' => '1',
            'vehicle_id' => '4',
            'price' => '120',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '2',
            'vehicle_id' => '4',
            'price' => '55',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '3',
            'vehicle_id' => '4',
            'price' => '40',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '4',
            'vehicle_id' => '4',
            'price' => '70',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '5',
            'vehicle_id' => '1',
            'price' => '60',
        ]);

        // Car 5
        DB::table('car_parts')->insert([
            'part_id' => '1',
            'vehicle_id' => '5',
            'price' => '120',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '2',
            'vehicle_id' => '5',
            'price' => '55',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '3',
            'vehicle_id' => '5',
            'price' => '40',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '4',
            'vehicle_id' => '5',
            'price' => '70',
        ]);

        DB::table('car_parts')->insert([
            'part_id' => '5',
            'vehicle_id' => '5',
            'price' => '60',
        ]);
    }
}
