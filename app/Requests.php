<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'complaints';

    protected $fillable = ['clientid', 'userid', 'subject', 'type', 'complaint'];


    public function user() {
      return $this->belongsTo('App\User', 'userid');
    }

}
