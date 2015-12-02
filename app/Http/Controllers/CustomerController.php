<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use Flash;

class CustomerController extends Controller
{
  public function __construct() {
      //$this->middleware('auth');
  }

  public function index($active = 1) {
    $customers = User::where('active', $active)->where('clientid', Auth::User()->clientid)->get();

    return view('customers.index',
                array('title' => 'Customers',
                      'sub' => Auth::User()->client->companyName,
                      'user' => Auth::User(),
                      'customers' => $customers,
                      'active' => $active
                    )
                );
  }

  public function add() {

    return view('customers.createOrUpdate',
                array('title' => 'New Customer',
                      'sub' => Auth::User()->client->companyName,
                      'user' => Auth::User()
                    )
                );
  }

  public function create() {

    $customer = User::create([
        'clientid' => Auth::User()->clientid,
        'fname' => Input::get('fname'),
        'lname' => Input::get('lname'),
        'phonenumber' => Input::get('phone'),
        'role' => 3,
        'email' => Input::get('email'),
        'password' => bcrypt(Input::get('password')),
        'active' => 1
    ]);
    Flash::success('New Customer Create!');
    return redirect('/customer/view/'. $customer->id);
  }

  public function view($id) {
    $user =  User::findOrFail($id);

    return view('customers.view',
                array('title' => $user->full_name,
                      'sub' => Auth::User()->client->companyName,
                      'user' => Auth::User(),
                      'customer' => $user
                    )
                );
  }

  public function edit($id) {
    $user =  User::findOrFail($id);

    return view('customers.createOrUpdate',
                array('title' => $user->full_name,
                      'sub' => Auth::User()->client->companyName,
                      'user' => Auth::User(),
                      'customer' => $user
                    )
                );
  }

  public function update($id) {

    $customer =  User::findOrFail($id);
    $customer->fname = Input::get('fname');
    $customer->lname = Input::get('lname');
    $customer->phonenumber = Input::get('phone');
    $customer->email = Input::get('email');
    if(Input::get('password') == Input::get('password_confirmation')) {
      if(!password_verify(Input::get('password'), $customer->password )) {
        $customer->password = bcrypt(Input::get('password'));
      }
    } else {
      Flash::error('Passwords do not match up');
      return redirect('/customer/edit/'. $customer->id);
    }
    $customer->save();

    Flash::success('Customer Updated');
    return redirect('/customer/view/'. $customer->id);
  }

  public function toggleStatus($id) {
    $customer =  User::findOrFail($id);
    if($customer->active == 1){
      $customer->active = 0;
      $msg = 'Deactivated';
    } else {
      $customer->active = 1;
      $msg = 'Activated';
    }

    $customer->save();
    Flash::info('Customer '. $msg);
    return redirect('/customer/view/'. $customer->id);
  }

}

?>
