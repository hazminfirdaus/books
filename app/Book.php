<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;
use App\Author;

class Book extends Model
{
    protected $table = 'books';

    public function publisher()
    {
      return $this->belongsTo('App\Publisher');
    }

    public function cartItems()
    {
      return $this->hasMany('App\CartItem');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
