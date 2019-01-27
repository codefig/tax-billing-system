<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model {
	//model for the driver payments

	protected $fillable = ['amount', 'user_id', 'type'];

	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}

	public function type() {

		if ($this->type == 1) {
			return "Daily Permit";
		} else if ($this->type == 2) {
			return "Montly Permit";
		} else {
			return "Annual Permit";
		}
	}
}