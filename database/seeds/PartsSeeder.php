<?php

use Illuminate\Database\Seeder;

class PartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parts')->insert([
            'part_id' => '1',
            'part_name' => 'Clutch',
        ]);

        DB::table('parts')->insert([
            'part_id' => '2',
            'part_name' => 'Front Brake Pads',
        ]);

        DB::table('parts')->insert([
            'part_id' => '3',
            'part_name' => 'Rear Brake Pads',
        ]);

        DB::table('parts')->insert([
            'part_id' => '4',
            'part_name' => 'Front Brake Discs',
        ]);

        DB::table('parts')->insert([
            'part_id' => '5',
            'part_name' => 'Rear Brake Discs',
        ]);
    }
}
