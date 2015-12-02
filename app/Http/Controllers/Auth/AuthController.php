<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Client;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/dashboard';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $client = Client::create([
          'companyName' => $data['companyName'],
          'type' => $data['utiltype'],
          'subscriptionType' => $data['subscriptionType'],
          'active' => 1
        ]);

        return User::create([
            'clientid' => $client->id,
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'phonenumber' => $data['phone'],
            'role' => 2,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'active' => 1
        ]);
    }
}
