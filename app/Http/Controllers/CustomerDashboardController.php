<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;

class CustomerDashboardController extends Controller
{
  public function __construct() {
      $this->middleware('auth');
      if(Auth::User() != null) {
        if(Auth::User()->active == 0) {
          Redirect::to('/auth/logout')->send();
        }
      }
  }

  public function index() {
    $currUser = Auth::User();
    $cntUsages = count($currUser->usages);
    return view('customer.index',
              array('title' => 'DashBoard',
              'sub' => $currUser->client->companyName,
              'user' => $currUser,
              'cntUsages' => $cntUsages
            ));
  }

  public function bill() {
    $currUser = Auth::User();
    return view('customer.bill',
              array('title' => 'Current Bill',
              'sub' => $currUser->client->companyName,
              'user' => $currUser
            ));
  }
}

?>
