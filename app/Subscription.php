<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';

    protected $fillable = ['clientid', 'limit', 'originalLimit', 'type', 'statementDate', 'dueDate', 'payDate'];

    public function user() {
      return $this->hasMany('App\User', 'id', 'clientid');
    }
}
