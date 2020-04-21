<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * VehicleMake
 *
 * Performs CRUD operation on car_parts table.
 */
class VehicleMake extends Model
{

    /**
     * This method gets the vehicle by name and returns an array of makes.
     * @param $searchTerm input used to search for the vehicle.
     * @return \Illuminate\Support\Collection array of vehicles
     */
    public static function getVehicle($searchTerm)
    {
      $vehicles = DB::table('vehicle_makes')
      ->select('vehicle_id', 'vehicle_vehicle', 'vehicle_model')
      ->where('vehicle_vehicle', 'like', '%'.$searchTerm.'%')
      ->get();
      return $vehicles;
    }

    /**
     * This method gets returns all the vehicles as array.
     * @return \Illuminate\Support\Collection array of vehicles.
     */
    public static function getAll()
    {
        $vehicles = DB::table('vehicle_makes')
        ->select('vehicle_id', 'vehicle_vehicle')
        ->get();
        return $vehicles;
    }
}
