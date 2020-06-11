<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BookController extends Controller
{
    public function index()
    {
      // $books = DB::select('SELECT * FROM `books`');

      $books = Book::all(); //select all

      return view('books.index', compact('books'));

      // return 'Hello from book controller';
    }

    public function show($book_id)
    {
      // $book_id = 2; //select specific id

      // $book = DB::select('SELECT * FROM `book` WHERE `id` = ?, [$book_id]');

      // $book = Book::find($book_id);

      // if($book === null)
      // {
      //   abort(404);
      // }

      // return Book::where('id', $book_id)->first();
      // return Book::where('id', $book_id)->get();

      // return Book::where('id', $book_id)->get();
      // return Book::where('id','=', $book_id)->get();
      // return Book::where('id','>', $book_id)->get();

      $book =Book::findOrFail($book_id); // return abort404 automatically if the id isn't exist

      // return $book;
      return view('books.show', compact('book'));
    }


    public function create()
    {
      return view('books.create');
    }
    

    public function store(Request $request)
    {

      $book = new Book;
      $book->title = $request->input('title');
      $book->authors = $request->input('authors');
      $book->image = $request->input('image');

      $book->save();

      // return $request->all();
      return redirect('/books/' . $book->id);
    }

    public function edit($book_id)
    {
      $book = Book::findOrFail($book_id);

      return view('books.edit', compact('book'));
    }


    public function update($book_id, Request $request)
    {

      $book = Book::findOrFail($book_id);

      $book->title = $request->input('title');
      $book->authors = $request->input('authors');
      $book->image = $request->input('image');

      $book->save();

      return redirect('/books/' . $book->id);
    }
    
}
