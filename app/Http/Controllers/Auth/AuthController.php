<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Client;
use App\Address;
use App\Subscription;
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
          'active' => 1
        ]);

        $subsLimit = $data['subscriptionType'] == 'basic' ? 250000 : ($data['subscriptionType'] == 'standard' ? 500000 : 1250000);
        $now = new \Datetime('now');
        $currMonth = $now->format('m');
        $currYear = $now->format('Y');
        $statementDate = \Datetime::createFromFormat('Y-m-d', $currYear . '-' . $currMonth . '-26');
        $dueDate = new \Datetime($statementDate->format('Y-m-d'));
        $dueDate->modify('+2 weeks');

        $subscription = Subscription::create(['clientid' => $client->id, 'limit' => $subsLimit, 'originalLimit' => $subsLimit, 'type' => $data['subscriptionType'], 'statementDate' => $statementDate->format('Y-m-d'), 'dueDate' => $dueDate->format('Y-m-d')]);
        $address = Address::create(['address' => $data['address'], 'state' => $data['state'], 'city' => $data['city'], 'zip' => $data['zip']]);

        return User::create([
            'clientid' => $client->id,
            'addressid' => $address->id,
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
