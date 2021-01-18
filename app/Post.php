<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Relationship with user
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // Relationship with Category
    public function categories()
    {
    	return $this->belongsToMany('App\Category')->withTimestamps();
    }

    // Relationship with Tag
    public function tags()
    {
    	return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    // Relationship with Favorite Post
    public function favorite_to_users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
