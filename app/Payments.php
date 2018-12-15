<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    //model for the driver payments

    protected $fillable = ['amount', 'user_id', 'type'];
}
