<?php

namespace App\Http\Controllers;

use App\Authent;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * StaffController
 *
 * This controller class handles all the Staff requests for data and returns correct views.
 */
class StaffController extends Controller
{
    /**
     * StaffController constructor.
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This method returns index view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View index view.
     */
    public function index()
    {
        return view('index/index');

    }

    /**
     * This method returns add user form view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|
     * \Illuminate\Routing\Redirector|\Illuminate\View\View add user form view
     */
    public function addUserForm()
    {
        if (\Auth::user()->auth_id == 1) {

            $auths = Authent::all();
            return view('register/add-user', ['auths' => $auths]);
        }

        return redirect('home');
    }

    /**
     * This method adds user to the database and redirects to another page.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector redirects to another page.
     * @throws \Illuminate\Validation\ValidationException input errors.
     */
    public function addUser(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:100',
                'lastName' => 'required|max:100',
                'email' => 'required|email',
                'password' => 'required',
                'authId' => 'required'
            ]);
        $lastId = Staff::getLastUserId();
        $lastId = $lastId[0]->id;

        $staff = new Staff();
        $staff->id = $lastId + 1;
        $staff->name = $request->name;
        $staff->last_name = $request->lastName;
        $staff->email = $request->email;
        $staff->auth_id = $request->authId;
        $password = Hash::make($request->password);
        $staff->password = $password;
        $staff->save();

        return redirect('adduser-form');
    }

    /**
     * This method gets all the users and returns a view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View all user view.
     */
    public function allUsers()
    {
        $users = Staff::getUsers();
        return view('user/users', ['users' => $users]);
    }

    /**
     * This method gets the user details and returns a user details view.
     * @param Request $request user id parameter.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\
     * Illuminate\Routing\Redirector|\Illuminate\View\View user details view.
     */
    public function getUserDetails(Request $request)
    {
        if (\Auth::user()->auth_id == 1) {
            $user = Staff::getUser($request->id);
            $auths = Authent::all();
            return view('user/edit-user', ['user' => $user, 'auths' => $auths]);
        } else {
            return redirect('home');
        }
    }

    /**
     * This method is using request data to update already existing user and redirects to a users page.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector redirects to a users page.
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateUser(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:100',
                'lastName' => 'required|max:100',
                'email' => 'required|email',
                'authId' => 'required'
            ]);
        Staff::updateUser($request);
        return redirect('users');
    }
}
