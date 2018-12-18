<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Payments extends Model
{
    //model for the driver payments

    protected $fillable = ['amount', 'user_id', 'type'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}