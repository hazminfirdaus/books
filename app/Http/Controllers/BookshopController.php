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

      $bookshop->name = $request->input('name');
      $bookshop->city = $request->input('city');

      $bookshop->save();

      session()->flash('success_message', 'The bookshop was successfully saved.');

      return redirect()->route('bookshops.index');

    }

    public function show($bookshop_id)
    {
        $bookshop = Bookshop::with('books')->findOrFail($bookshop_id); //to get particular bookshop with books

        return view('bookshops.show', compact('bookshop'));
    }

}
