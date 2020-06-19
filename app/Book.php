<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;
use App\Author;
use App\Bookshop;

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

    public function bookshops()
    {
        return $this->belongsToMany(Bookshop::class)->withPivot(['stock']);
    }

    public function relatedBooks()
    {
        return $this->belongsToMany(Book::class, 'related_books', 'book_id', 'related_id');
    }

    public function reservations()
    {
        return $this-hasMany(Reservation::class);
    }
}
