<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::all();

        return view('cart.index', compact('cartItems'));
    }


    public function add(Request $request)
    {
        $item = CartItem::where('book_id', $request->input('book_id'))->first();

        if ($item != null) {
            //item with choosen book_id allready exits, I want just to update count

            $item->count += $request->input('count');
            $item->save();

        } else {
            //item with choosen book_id does NOT exist, I will create it

            $cartItem = new CartItem;

            $cartItem->book_id = $request->input('book_id');
            $cartItem->count   = $request->input('count');

            $cartItem->save();
        }


        return redirect('/cart');
    }
}
