<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function portfolio()
    {
    	return $this->belongsTo('App\Portfolio');
    }
    public function stock()
    {
    	return $this->belongsTo('App\Stock');
    }
}
