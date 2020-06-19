<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Review;

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

      $book = Book::findOrFail($book_id); // return abort404 automatically if the id isn't exist

      $alreadyRelatedIds = $book->relatedBooks->pluck('id');
      $nonRelatedBooks = Book::whereNotIn('id', $alreadyRelatedIds)->get();

      // return $book;
      return view('books.show', compact('book', 'nonRelatedBooks'));
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
      return redirect('/books' . $book->id);
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

    public function review(Request $request, $book_id)
    {
        $this->validate($request, [
            'text' => 'required|max:255',
            'rating' => 'nullable|numeric|between:0,100'
        ],  [
            'rating.between' => 'That number is outside of bound.',
            'text.required' => 'A review without a text does not make sense.',
            'text.max' => 'Max text is 255 characters.'
        ]);
        
        $review = new Review;

        $review->book_id  = $book_id;
        $review->text     = $request->input('text');
        $review->rating   = $request->input('rating');
    
        $review->save();

        session()->flash('success_message', 'Review was saved. Thank you!');
    
        return redirect()->action('BookController@show', [ $book_id ]);
    } 

    public function addRelatedBook($book_id, Request $request)
    {
        $book = Book::findOrFail($book_id);

        $related_id = $request->input('related_id');
        $book->relatedBooks()->attach($related_id);

        return redirect(action('BookController@show', $book->id));
    }

    public function removeRelatedBook($book_id, Request $request)
    {
        $book = Book::findOrFail($book_id);

        $related_id = $request->input('related_id');
        $book->relatedBooks()->detach($related_id);

        return redirect(action('BookController@show', $book->id));
    }


}
