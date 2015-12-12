<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostStatus extends Model
{

	protected $fillable = ['status_name'];
	public $timestamps = false;
	
}