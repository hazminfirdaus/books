<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookshop;
use App\Book;

class BookshopController extends Controller
{
    public function index()
    {
        $bookshops = Bookshop::all();

        return view('bookshops.index', compact('bookshops'));
    }

    public function create()
    {
        $books = Book::all();

        return view('bookshops.create', compact('books'));
    }

    public function store(Request $request)
    {

      $this->validate($request, [
        'name' => 'required|string|max:255',
        'city' => 'required|string|max:255'
      ]);

      $bookshop = new Bookshop;

      $bookshop->name = $request->input('name');
      $bookshop->city = $request->input('city');

      $bookshop->save();

      $books_ids = $request->input('books');
      $bookshop->books()->sync($books_ids);

      session()->flash('success_message', 'The bookshop was successfully saved.');

      return redirect()->route('bookshops.index');

    }

    public function show($bookshop_id)
    {
        $bookshop = Bookshop::with('books')->findOrFail($bookshop_id); //to get particular bookshop with books

        $alreadyConnected = $bookshop->books->pluck('id'); // get ids of books connected to the bookshop

        $books = Book::whereNotIn('id', $alreadyConnected)->get(); // select form DB all the books except the ones that are allready connected

        return view('bookshops.show', compact('bookshop', 'books'));
    }

    public function addBook($bookshop_id, Request $request)
    {
        $bookshop = Bookshop::findOrFail($bookshop_id);

        $book_id = $request->input('book_id');
        $bookshop->books()->attach($book_id);

        return redirect(action('BookshopController@show', $bookshop->id));
    }

    public function removeBook($bookshop_id, Request $request)
    {
        $bookshop = Bookshop::findOrFail($bookshop_id);

        $book_id = $request->input('book_id');
        $bookshop->books()->detach($book_id);

        return redirect(action('BookshopController@show', $bookshop->id));
    }
}
