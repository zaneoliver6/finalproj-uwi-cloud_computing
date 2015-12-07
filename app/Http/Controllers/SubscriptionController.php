<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Client;
use App\Subscription;
use App\SubscriptionLog;
use Redirect;
use Auth;
use Input;
use Flash;

class SubscriptionController extends Controller
{

  public function __construct() {
      $this->middleware('auth');

      if(Auth::User() != null) {
        if(Auth::User()->role == 3) {
          Redirect::to('/dashboard/customer')->send();
        }
        if(Auth::User()->active == 0) {
          Redirect::to('/auth/logout')->send();
        }
      }
  }

  public function scaleUp($amt) {

    $subscription = Auth::User()->client->subscription;
    $newLimit = $subscription->limit + $amt;
    $subscription->limit = $newLimit;
    $subscription->save();

    $now = new \Datetime('now');
    $subscriptionLog = new SubscriptionLog();
    $subscriptionLog->clientid = Auth::User()->client->id;
    $subscriptionLog->whatchange = 'increase by';
    $subscriptionLog->towhat = $amt;
    $subscriptionLog->date = $now->format('Y-m-d');
    $subscriptionLog->enddate = $subscription->statementDate;
    $subscriptionLog->save();

    Flash::success('Subscription increased.');
    return redirect('/dashboard');

  }

  public function scaleDown($amt) {

    $subscription = Auth::User()->client->subscription;
    $newLimit = $subscription->limit - $amt;
    if($newLimit < $subscription->originalLimit) {
      Flash::error('You can not go lower than the Original Package Limit');
      return redirect('/dashboard');
    }
    $subscription->limit = $newLimit;
    $subscription->save();

    $now = new \Datetime('now');
    $subscriptionLog = new SubscriptionLog();
    $subscriptionLog->clientid = Auth::User()->client->id;
    $subscriptionLog->whatchange = 'decrease by';
    $subscriptionLog->towhat = $amt;
    $subscriptionLog->date = $now->format('Y-m-d');
    $subscriptionLog->enddate = $subscription->statementDate;
    $subscriptionLog->save();

    Flash::success('Subscription decreased.');
    return redirect('/dashboard');
  }

  public function change($type) {

    $subscription = Auth::User()->client->subscription;
    $subscription->type = $type;
    $limit = '0';
    if($type == 'basic') {
      $limit = '250000';
    } else if($type == 'standard') {
      $limit = '500000';
    } else if($type == 'premium') {
      $limit = '1250000';
    }
    $subscription->limit = $limit;
    $subscription->originalLimit = $limit;
    $subscription->save();

    Flash::success('Subscription changed.');
    return redirect('/dashboard');
  }

}
