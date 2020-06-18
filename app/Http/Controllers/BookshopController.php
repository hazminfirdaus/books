<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookshop;

class BookshopController extends Controller
{
    public function index()
    {
        $bookshops = Bookshop::all();

        return view('bookshops.index', compact('bookshops'));
    }

    public function create()
    {
        $bookshop = new Bookshop;

        return view('bookshops.create', compact('bookshop'));
    }

    public function store(Request $request)
    {

      $this->validate($request, [
        'name' => 'required|max:255',
        'city' => 'required|max:255'
      ]);

      $bookshop = new Bookshop;

      // fill the object from request
      $bookshop->name = $request->input('name');
      $bookshop->city = $request->input('city');

      // save
      $bookshop->save();

      // flash success message (provide it to the next request)
      session()->flash('success_message', 'The bookshop was successfully saved.');

      // redirect to edit form, supplying the id of publisher to be used in the URL
      return redirect()->route('bookshops.index');

    }

}
