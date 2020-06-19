<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Book;
use App\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $books = Book::all();

        return view('reservations.create', compact('books'));
    }

    public function store(Request $request)
    {
        $reservation = new Reservation;

        $reservation->user_id = Auth::user()->id;

//        $reservation->user_id = auth()->user()->id;

        $reservation->book_id = $request->input('book_id');
        $reservation->from = $request->input('from');
        $reservation->to = $request->input('to');

        $reservation->save();

        return redirect(action('ReservationController@index'));
    }
}
