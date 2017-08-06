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
}
