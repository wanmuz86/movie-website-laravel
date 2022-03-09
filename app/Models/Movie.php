<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ["title","poster_url","synopsis","video_url","year","director_id","category_id"];

    public function movie(){
        return $this->belongsTo(Category::class);
    }
// actor_movie
    public function actors(){
        return $this->belongsToMany(Actor::class);
    }

    public function director(){
        return $this->belongsTo(Director::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
// movie_user -> this is the default
// We want to override the table name
// The second paremeter, is to override the default table name
    public function favourites(){
        return $this->belongsToMany(User::class, 'movie_user_fav');
    }

    // movie_user
    public function bookmarks(){
        return $this->belongsToMany(User::class, 'movie_user_bookmark');
    }
}
