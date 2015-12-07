<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Client;
use App\Subscription;
use App\SubscriptionLog;
use Auth;
use Input;
use Redirect;
use Flash;

class BillingController extends Controller
{

  public function __construct() {
      $this->middleware('auth');

      if(Auth::User() != null) {
        if(Auth::User()->role === '3') {
          Redirect::to('/dashboard/customer')->send();
        }
      }
  }

  public function current() {
    $total = 0;
    $additional = array();
    $totaladd = array();

    if(Auth::User()->client->Subscription->type == 'basic') {
      $total = floatval('25');
    } else if(Auth::User()->client->Subscription->type == 'standard'){
      $total = floatval('50');
    } else {
      $total = floatval('75');
    }

    if(Auth::User()->client->subscriptionLogs != null) {

      $now = new \Datetime('now');
      $currMonth = $now->format('m');
      $currYear = $now->format('Y');
      $currstatementDate = \Datetime::createFromFormat('Y-m-d', $currYear . '-' . $currMonth . '-26');
      $lastDate = new \Datetime($currstatementDate->format('Y-m-d'));
      $lastDate->modify('-1 month');

      $logs = Auth::User()->client->subscriptionLogs;
      foreach($logs as $log) {
        $date = new \Datetime($log->date);
        $enddate =  new \Datetime($log->enddate);
        if(($date > $lastDate) && ($date < $enddate)) {
          $dateDiff = $enddate->diff($date);
          $info = array('days' => $dateDiff->format('%a'), 'type' => $log->whatchange, 'amt' => $log->towhat);
          array_push($additional, $info);
        }
        // else if any addtions from last month still in effect then calculate and add in here. limit - original limit * days * 0.0001
        // add this into task scheduler
      }

      foreach($additional as $key => $add) {
        if($add['type'] == 'decrease by') {
          $diff = $additional[$key-1]['days'] - $add['days'];
          $totalPrev = $diff * $additional[$key-1]['amt'] * 0.0001;
          $i = array('days' => $diff, 'amt' => $additional[$key-1]['amt'] , 'cost' => $totalPrev, 'type' => $add['type']);
          array_pop($totaladd);
          array_push($totaladd, $i);
        }
        $currentTotal = $add['days'] * $add['amt'] * 0.0001;
        $c = array('days' => $add['days'], 'amt' => $add['amt'], 'cost' => $currentTotal, 'type' => $add['type']);
        array_push($totaladd, $c);
      }
    }

    return view('billing.current',
                array('title' => 'Current Bill',
                      'sub' => Auth::User()->client->companyName,
                      'user' => Auth::User(),
                      'subtotal' => $total,
                      'additional' => $totaladd
                    )
                );

  }

}
