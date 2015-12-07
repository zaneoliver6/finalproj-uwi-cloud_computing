<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use Flash;
use Input;

class RequestController extends Controller
{
  public function __construct() {
      $this->middleware('auth');

      if(Auth::User()->active == 0) {
        Redirect::to('/auth/logout')->send();
      }
  }

  public function index() {
    $req = Requests::where('clientid', Auth::User()->client->id)->get();

    return view('request.index',
              array('title' => 'Requests',
              'sub' => Auth::User()->client->companyName,
              'user' => Auth::User(),
              'reqs' => $req
            ));
  }

  public function newRequest() {
    $currUser = Auth::User();

    return view('request.new',
              array('title' => 'Requests',
              'sub' => $currUser->client->companyName,
              'user' => $currUser
            ));
  }

  public function create() {

    $req = Requests::create(['clientid' => Auth::User()->client->id, 'userid' => Auth::User()->id, 'subject' => Input::get('subject'), 'type' => Input::get('type'), 'complaint' => Input::get('body')]);

    Flash::info('Request added');
    return redirect('/dashboard/customer');

  }

}

?>
