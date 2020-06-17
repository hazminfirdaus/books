@extends('layouts.layout', [
    'title' => 'Cart'
])

@section('content')

    <h1>Cart</h1>

    @foreach($cartItems as $cartItem)

        <div>

            <h2>{{ $cartItem->book->title}}</h2>
            <h3>{{ $cartItem->book->publisher->title}}</h3>

            <p>Count: {{ $cartItem->count }}</p>

        </div>

    @endforeach

<button>Checkout</button>

@endsection
