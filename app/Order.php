<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Order
 *
 * Performs CRUD operation on car_parts table.
 */
class Order extends Model
{
    /**
     * This method gets the last order from the database and returns it.
     * @return Model|\Illuminate\Database\Query\Builder|int|mixed|null|object id of the last order.
     */
    public static function getLastId()
    {
        $id = DB::table('orders')->orderBy('order_ids', 'desc')->first();
        if (isset($id)) {
            $id = $id->order_ids;
        } else {
            $id = 0;
        }
        return $id;
    }

    /**
     * This method adds new order to the database.
     * @param $name customer name used for the order.
     */
    public static function addOrder($name)
    {
        $basket = session('cart');
        $id = Order::getLastId();
        foreach ($basket as $part) {
            DB::table('orders')->insertGetId(
                ['order_ids' => $id + 1, 'order_customer_name' => $name, 'order_car_parts' => $part[0]['id'], 'order_status' => '0']);
        }
    }

    /**
     * This method get all the orders from the database and returns as a array.
     * @return array|mixed list of orders.
     */
    public static function getOrders()
    {
        $orders = DB::table('orders')->select('order_ids', 'order_customer_name')->groupBy('order_ids')->groupBy('order_customer_name')->get();
        $orderList = [];
        foreach ($orders as $order) {
            //$part = CarPart::getById($order->order_car_parts);
            $list = ['order' => $order];
            array_push($orderList, $list);
        }
        $orderList = json_decode(json_encode($orderList), True);
        return $orderList;
    }

    /**
     * This method gets the order by id and returns a array of order items.
     * @param $id of the order to return details for.
     * @return array|mixed array of order details.
     */
    public static function getOrdersDetails($id)
    {
        $orders = DB::table('orders')->where('order_ids', '=', $id)->get();
        $orderList = [];
        $price = 0;
        foreach ($orders as $order) {
            $part = CarPart::getById($order->order_car_parts);
            $list = ['order' => $order, 'part' => $part];
            array_push($orderList, $list);
        }
        $orderList = json_decode(json_encode($orderList), True);
        return $orderList;
    }

    /**
     * This function removes order item or whole order from the database depending on column
     * used as a parameter.
     * @param $column name of the column base remove on.
     * @param $id id of the order or order item to remove.
     */
    public static function remove($column, $id)
    {
        DB::table('orders')->where($column, '=', $id)->delete();
    }
}
