<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Author extends Model
{
    public function books()
    {
        return $this->belongToMany(Book::class);
    }
}
