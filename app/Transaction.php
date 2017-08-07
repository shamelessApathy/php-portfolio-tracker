<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function portfolio()
    {
    	return $this->belongsTo('App\Portfolio');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function stock()
    {
    	return $this->belongsTo('App\Stock');
    }
}
