<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use Input;
use Flash;

class ProfileController extends Controller
{
  public function __construct() {
      $this->middleware('auth');
  }

  public function index() {
    $currUser = Auth::User();

    return view('profile.index',
              array('title' => 'DashBoard',
              'sub' => $currUser->client->companyName,
              'user' => $currUser
            ));
  }

  public function edit() {
    $customer =  Auth::User();

    return view('profile.edit',
                array('title' => $customer->full_name,
                      'sub' => Auth::User()->client->companyName,
                      'user' => Auth::User(),
                      'customer' => $customer,
                    )
                );
  }

  public function update() {

    $customer =  Auth::User();
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
      return redirect('/profile/edit');
    }
    $customer->save();

    $address = $customer->address;
    $address->address = Input::get('address');
    $address->state = Input::get('state');
    $address->city = Input::get('city');
    $address->zip = Input::get('zip');
    $address->save();

    Flash::success('Profile Updated');
    return redirect('/profile');
  }



}

?>
