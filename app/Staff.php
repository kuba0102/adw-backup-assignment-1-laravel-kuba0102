<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Staff
 *
 * Performs CRUD operation on car_parts table.
 */
class Staff extends Model
{
    protected $table = 'users';

    /**
     * This method gets the last user and returns its id.
     * @return \Illuminate\Support\Collection last user id.
     */
    public static function getLastUserId()
    {
      $lastId = DB::table('users')
      ->select('id')
      ->orderBy('id','desc')
      ->limit(1)
      ->get();
      return $lastId;
    }

    /**
     * This method gets all the users and returns them as a array.
     * @return \Illuminate\Support\Collection array of users.
     */
    public static function getUsers()
    {
      $users = DB::table('users')->get();
      return $users;
    }

    /**
     * This method gets User by id and returns it.
     * @param $id user id.
     * @return Model|\Illuminate\Database\Query\Builder|null|object User found.
     */
    public static function getUser($id)
    {
        $user = DB::table('users')->join('auth_levels', 'users.auth_id', '=', 'auth_levels.auth_id')
        ->select('users.*', 'auth_levels.auth_name')
        ->where('users.id', '=', $id)
        ->first();
        return $user;
    }

    /**
     * This method updates user in the database.
     * @param $request data to be used as an update.
     */
    public static function updateUser($request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update(['name' => $request->name,
            'last_name'=> $request->lastName,
            'email' => $request->email,
            'auth_id' => $request->authId]);
    }

}
