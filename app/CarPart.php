<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * CarPart
 *
 * Performs CRUD operation on car_parts table.
 */
class CarPart extends Model
{
    /**
     * This method gets the array of all the parts and vehicle information.
     * @return \Illuminate\Support\Collection array of parts.
     */
    public static function getAllParts()
    {
        $parts = DB::table('car_parts')
            ->join('parts', 'car_parts.part_id', '=', 'parts.part_id')
            ->join('vehicle_makes', 'car_parts.vehicle_id', '=', 'vehicle_makes.vehicle_id')
            ->select('car_parts.id', 'parts.part_name', 'vehicle_makes.vehicle_vehicle', 'vehicle_makes.vehicle_model')
            ->get();
        return $parts;
    }

    /**
     * This method gets CarParts by a search term and returns a array of CarParts
     * @param $searchTerm input term used to search.
     * @return \Illuminate\Support\Collection array of parts.
     */
    public static function searchParts($searchTerm)
    {
        $parts = DB::table('car_parts')
            ->join('parts', 'car_parts.part_id', '=', 'parts.part_id')
            ->join('vehicle_makes', 'car_parts.vehicle_id', '=', 'vehicle_makes.vehicle_id')
            ->select('car_parts.id', 'parts.part_name', 'vehicle_makes.vehicle_vehicle', 'vehicle_makes.vehicle_model')
            ->where('parts.part_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('vehicle_makes.vehicle_vehicle', 'like', $searchTerm)
            ->orWhere('vehicle_makes.vehicle_model', 'like', $searchTerm)
            ->get();
        return $parts;
    }

    /**
     * This method gets CarParts that match the filter parameters and returns a array CarParts.
     * @param $part input term used to search.
     * @param $make input term used to search.
     * @param $model input term used to search.
     * @return \Illuminate\Support\Collection array of CarParts
     */
    public static function filter($part, $make, $model)
    {
        $parts = DB::table('car_parts')
            ->join('parts', 'car_parts.part_id', '=', 'parts.part_id')
            ->join('vehicle_makes', 'car_parts.vehicle_id', '=', 'vehicle_makes.vehicle_id')
            ->select('car_parts.id', 'parts.part_name', 'vehicle_makes.vehicle_vehicle', 'vehicle_makes.vehicle_model')
            ->where('parts.part_name', '=', $part)
            ->Where('vehicle_makes.vehicle_vehicle', '=', $make)
            ->Where('vehicle_makes.vehicle_model', '=', $model)
            ->get();
        return $parts;
    }

    /**
     * This method gets the CarPart that matches the id.
     * @param $partId id of the CarPart.
     * @return \Illuminate\Support\Collection CarPart.
     */
    public static function getById($partId)
    {
        $parts = DB::table('car_parts')
            ->join('parts', 'car_parts.part_id', '=', 'parts.part_id')
            ->join('vehicle_makes', 'car_parts.vehicle_id', '=', 'vehicle_makes.vehicle_id')
            ->select('car_parts.id', 'car_parts.price', 'parts.part_name', 'vehicle_makes.vehicle_vehicle', 'vehicle_makes.vehicle_model')
            ->where('car_parts.id', '=', $partId)
            ->get();
        return $parts;
    }
}
