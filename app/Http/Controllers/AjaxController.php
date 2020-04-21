<?php

namespace App\Http\Controllers;

use App\CarPart;
use App\Http\Requests;
use App\VehicleMake;
use Illuminate\Http\Request;

/**
 * AjaxController
 *
 * This controller class handles all the ajax requests for data and returns correct views.
 */
class AjaxController extends Controller
{
    /**
     * AjaxController constructor.
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This method handles filter request and load a view.
     * @param Request $request id of the vehicle make.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View filter selection view.
     */
    public function filter(Request $request)
    {
        $vehicleModels = VehicleMake::getVehicle($request->myparam);
        return view('ajax/models-filters', ['vehicleModels' => $vehicleModels]);
    }

    /**
     * This method loads basket view with order data that was stored in session.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View basket view.
     */
    public function loadBasket()
    {
        AjaxController::getTotal();
        $basket = session('cart');
        return view('ajax/basket');
    }

    /**
     * This method adds order item to basket array that is stored as session parameter.
     * @param Request $request order id.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addBasket(Request $request)
    {
        if (session('cart')[0] == 'null') {
            $basket = [$request->myparam];
            $part = CarPart::getById($request->myparam);
            $basket = [$part];
            $basket = json_decode(json_encode($basket), True);
            session(['cart' => $basket]);
        } else {
            $basket = session('cart');
            $part = CarPart::getById($request->myparam);
            array_push($basket, $part);
            $basket = json_decode(json_encode($basket), True);
            session(['cart' => $basket]);
        }
        AjaxController::getTotal();
        return view('ajax/basket');
    }

    /**
     * This method removes order item from basket array that is stored as session parameter.
     * @param Request $request order id.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function removeBasket(Request $request)
    {
        $basket = session('cart');
        $newBasket = [];
        $count = 0;
        foreach ($basket as $key) {
            $partId = $key[0]['id'];
            $myParam = $request->myparam;
            if (($myParam == $partId) and ($count == 0)) {
                $count = 1;
                if (count($basket) == 1) {
                    $newBasket = ['null'];
                }
            } else {
                array_push($newBasket, $key);
            }
        }
        session(['cart' => $newBasket]);
        AjaxController::getTotal();
        return view('ajax/basket');
    }

    /**
     * Calculates total for the basket and puts it into session parameter.
     */
    private function getTotal()
    {
        $total = 0;
        $basket = session('cart');
        if ($basket[0] == 'null') {
            $total = 0;
        } else {
            foreach ($basket as $key) {
                $total = $total + $key[0]['price'];

            }
        }
        session(['total' => $total]);
    }
}
