<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['companyName', 'type', 'subscriptionType', 'active'];

    public function user() {
      return $this->hasMany('App\User', 'id', 'clientid');
    }

    public function subscription() {
      return $this->hasOne('App\Subscription', 'clientid', 'id');
    }
}
