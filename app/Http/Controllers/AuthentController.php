<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * AuthentController
 *
 * This controller class handles all the authent requests for data and returns correct views.
 */
class AuthentController extends Controller
{
    /**
     * This method returns login form view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View login form view.
     */
    function loginForm()
    {
        return view('login/login');
    }

    /**
     * This method logs user into the application and sets user session parameter.
     * @param Request $request login parameter.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function login(Request $request)
    {
        session(['cart' => $basket = ['null']]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/home');
        }
        $request->session()->flash('loginError', "Those details aren't correct");
        return redirect('/login');
    }

    /**
     * This method logs user out by clearing session and redirects to login page.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector login page.
     */
    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
