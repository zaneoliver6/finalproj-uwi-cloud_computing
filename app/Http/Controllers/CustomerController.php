<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Address;
use App\Usage;
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
                      'user' => Auth::User(),
                      'backUrl' => '/dashboard'
                    )
                );
  }

  public function create() {

    $now = new \Datetime('now');
    $currMonth = $now->format('m');
    $currYear = $now->format('Y');

    $statementDate = \Datetime::createFromFormat('Y-m-d', $currYear . '-' . $currMonth . '-28');
    $dueDate = new \Datetime($statementDate->format('Y-m-d'));
    $dueDate->modify('+2 weeks');

    $units = Auth::User()->client->type == 'water' ? 'Gallons' : (Auth::User()->client->type == 'electric' ? 'KWH' : 'Minutes');

    $address = Address::create(['address' => Input::get('address'), 'state' => Input::get('state'), 'city' => Input::get('city'), 'zip' => Input::get('zip')]);

    $customer = User::create([
        'clientid' => Auth::User()->clientid,
        'addressid' => $address->id,
        'fname' => Input::get('fname'),
        'lname' => Input::get('lname'),
        'phonenumber' => Input::get('phone'),
        'role' => 3,
        'email' => Input::get('email'),
        'password' => bcrypt(Input::get('password')),
        'active' => 1
    ]);

    $usage = Usage::create(['cid' => $customer->id, 'units' => $units, 'statementDate' => $statementDate->format('Y-m-d'), 'dueDate' => $dueDate->format('Y-m-d')]);

    Flash::success('New Customer Created!');
    return redirect('/customer/view/'. $customer->id);
  }

  public function view($id) {
    $customer =  User::where('id', $id)->where('clientid', Auth::User()->clientid)->firstOrFail();
    $cntUsages = count($customer->usages);

    return view('customers.view',
                array('title' => $customer->full_name,
                      'sub' => Auth::User()->client->companyName,
                      'user' => Auth::User(),
                      'customer' => $customer,
                      'cntUsages' => $cntUsages
                    )
                );
  }

  public function edit($id) {
    $customer =  User::where('id', $id)->where('clientid', Auth::User()->clientid)->firstOrFail();

    return view('customers.createOrUpdate',
                array('title' => $customer->full_name,
                      'sub' => Auth::User()->client->companyName,
                      'user' => Auth::User(),
                      'customer' => $customer,
                      'backUrl' => '/customers'
                    )
                );
  }

  public function update($id) {

    $customer =  User::where('id', $id)->where('clientid', Auth::User()->clientid)->firstOrFail();
    $customer->fname = Input::get('fname');
    $customer->lname = Input::get('lname');
    $customer->phonenumber = Input::get('phone');
    $customer->email = Input::get('email');

    if(Input::get('password') == Input::get('password_confirmation')) {
      if(Input::get('password') != '') {
        if(!password_verify(Input::get('password'), $customer->password )) {
          $customer->password = bcrypt(Input::get('password'));
        }
      }
    } else {
      Flash::error('Passwords do not match up');
      return redirect('/customer/edit/'. $customer->id);
    }
    $customer->save();

    $address = $customer->address;
    $address->address = Input::get('address');
    $address->state = Input::get('state');
    $address->city = Input::get('city');
    $address->zip = Input::get('zip');
    $address->save();

    Flash::success('Customer Updated');
    return redirect('/customer/view/'. $customer->id);
  }

  public function toggleStatus($id) {
    $customer =  User::where('id', $id)->where('clientid', Auth::User()->clientid)->firstOrFail();
    if($customer->active == 1){
      $customer->active = 0;
      $msg = 'Deactivated';
    } else {
      $customer->active = 1;
      $msg = 'Activated';
    }

    $customer->save();
    Flash::warning('Customer '. $msg);
    return redirect('/customer/view/'. $customer->id);
  }

  public function arrears() {
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

}

?>
