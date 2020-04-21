<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Part
 *
 * Performs CRUD operation on car_parts table.
 */
class Part extends Model
{
    /**
     * This method gets parts from the database.
     * @return \Illuminate\Support\Collection array of parts
     */
    public static function getPart()
    {
        $part = DB::table('parts')
            ->select('part_id', 'part_name')
            ->get();
        return $part;
    }
}
