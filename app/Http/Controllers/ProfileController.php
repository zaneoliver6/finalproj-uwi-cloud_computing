<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;

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
}

?>
