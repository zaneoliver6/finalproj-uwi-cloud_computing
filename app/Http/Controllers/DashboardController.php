<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;

class DashboardController extends Controller
{
  public function __construct() {
      //$this->middleware('auth');

      if(Auth::User()->role === 3) {
        //Redirect::to('/customers')->send();
      }
  }

  public function index() {
    $currUser = Auth::User();
    $currClient = Client::findOrFail($currUser->clientid);

    $subsLimit = $currClient->subscriptionType == 'basic' ? 250000 : ($currClient->subscriptionType == 'standard' ? 500000 : 1250000);

    $cusCount = User::where('active', 1)->where('clientid', $currUser->clientid)->count();
    return view('dashboard.index',
              array('title' => 'DashBoard',
              'sub' => $currClient->companyName,
              'user' => $currUser,
              'cusCount' => $cusCount,
              'subsLimit' => $subsLimit
            ));
  }
}

?>
