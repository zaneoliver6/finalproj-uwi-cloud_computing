<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionLog extends Model
{
    protected $table = 'subscription_log';

    protected $fillable = ['clientid', 'whatchange', 'towhat', 'type', 'date', 'enddate'];
}
