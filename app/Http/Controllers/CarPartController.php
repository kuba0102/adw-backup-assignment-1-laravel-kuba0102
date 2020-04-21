<?php

namespace App\Http\Controllers;

use App\CarPart;
use App\Part;
use App\VehicleMake;
use Illuminate\Http\Request;

/**
 * AuthentController
 *
 * This controller class handles all the CarPart requests for data and returns correct views.
 */
class CarPartController extends Controller
{
    /**
     * CarPartController constructor.
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This method gets the CarParts and returns a view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View index
     */
    public function getAllParts()
    {
        $carParts = CarPart::getAllParts();
        $vehicles = VehicleMake::getAll();
        $parts = Part::getPart();
        return view('index/index', ['carParts' => $carParts, 'vehicles' => $vehicles, 'parts' => $parts]);

    }

    /**
     * This method gets the search array of CarParts and returns a view.
     * @param Request $request search term.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function searchParts(Request $request)
    {
        if (isset($request->search)) {
            $carParts = CarPart::searchParts($request->search);
            $vehicles = VehicleMake::getAll();
            $parts = Part::getPart();
            return view('index/index', ['carParts' => $carParts, 'searchTerm' => $request->search, 'vehicles' => $vehicles, 'parts' => $parts]);
        } else {
            return redirect('home');
        }
    }

    /**
     * This method gets the filtered array of CarParts and returns a view.
     * @param Request $request search term.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function filter(Request $request)
    {
        $carParts = CarPart::filter($request->part, $request->make, $request->model);
        $vehicles = VehicleMake::getAll();
        $parts = Part::getPart();
        return view('index/index', ['carParts' => $carParts, 'searchTerm' => $request->search, 'vehicles' => $vehicles, 'parts' => $parts]);
    }
}
