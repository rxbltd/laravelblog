<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	// relationship with User
    public function users()
    {
    	return $this->hasMany('App\User');
    }
}