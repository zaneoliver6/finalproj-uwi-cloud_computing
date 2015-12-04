<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    protected $table = 'usage';

    protected $fillable = ['cid','units', 'amount', 'statementDate', 'dueDate'];
}
