<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publisher;

use App\Book;

class PublisherController extends Controller
{
    public function index()
    {
      $publishers = Publisher::all();

      return view('publishers.index', compact('publishers'));
    }


    public function show($publisher_id)
    {
      $publisher =Publisher::findOrFail($publisher_id);

      $books = Book::where('publisher_id', $publisher_id)->get();

      return view('publishers.show', compact('publisher', 'books'));
    }
}
