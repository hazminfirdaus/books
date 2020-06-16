<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

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
}
