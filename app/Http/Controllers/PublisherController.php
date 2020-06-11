<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use App\Book;

class PublisherController extends Controller
{
    public function index()
    {
      $publishers = Publisher::with('books')->get();

      return view('publishers.index', compact('publishers'));
    }


    public function show($publisher_id)
    {
      $publisher =Publisher::findOrFail($publisher_id);

      $books = Book::where('publisher_id', $publisher_id)->get();

      return view('publishers.show', compact('publisher', 'books'));
    }

    public function create()
    {
        $publisher = new Publisher;

        return view('publishers.edit', compact('publisher'));
    }

    public function store(Request $request)
    {
      
    }

    public function edit($id)
    {
      
    }

    public function update(Request $request, $id)
    {
      
    }
}
