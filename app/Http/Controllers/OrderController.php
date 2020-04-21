<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

/**
 * OrderController
 *
 * This controller class handles all the Order requests for data and returns correct views.
 */
class OrderController extends Controller
{
    /**
     * OrderController constructor.
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This method returns a checkout view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View checkout view.
     */
    public function getCheckout()
    {
        return view('checkout/checkout');
    }

    /**
     * This method adds the order to data base and returns a checkout view.
     * @param Request $request order parameters.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addOrder(Request $request)
    {
        $this->validate($request, ['customer_name' => 'required|max:100']);
        $name = $request->customer_name;
        Order::addOrder($name);
        session(['cart' => $basket = ['null']]);
        session(['total' => $total = 0]);
        return view('checkout/checkout');
    }

    /**
     * This method gets all the orders and returns a view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrders()
    {
        $orders = Order::getOrders();
        return view('order/order', ['orders' => $orders]);
    }

    /**
     * This method gets all the order items and returns a view.
     * @param Request $request id of the orders.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrderDetails(Request $request)
    {
        $orders = Order::getOrdersDetails($request->id);
        return view('order/order-details', ['orders' => $orders]);
    }

    /**
     * This method removes either whole order or order id depending on the request type submitted.
     * Returns a view or redirects.
     * @param Request $resuest order parameters.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public static function removeOrder(Request $resuest)
    {
        if ($resuest->type == 1) {
            Order::remove('order_ids', $resuest->order_ids);
            return redirect('order');
        } else {
            Order::remove('order_id', $resuest->order_id);
            return redirect('order-details/.?id=' . '' . $resuest->order_ids);
        }


    }

}
