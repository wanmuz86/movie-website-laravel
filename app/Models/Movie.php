<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function movie(){
        $this->belongsTo(Category::class);
    }
// actor_movie
    public function actors(){
        $this->belongsToMany(Actor::class);
    }

    public function director(){
        $this->belongsTo(Director::class);
    }
// movie_user -> this is the default
// We want to override the table name
// The second paremeter, is to override the default table name
    public function favourites(){
        $this->belongsToMany(User::class, 'movie_user_fav');
    }

    // movie_user
    public function bookmarks(){
        $this->belongsToMany(User::class, 'movie_user_bookmark');
    }
}
