<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function __construct() {
      //$this->middleware('auth');
  }

  public function index() {
    return view('dashboard.index',array('title' => 'DashBoard', 'sub' => 'Client Name'));
  }
}

?>
