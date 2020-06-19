@extends('layouts.layout', [
    'title' => $bookshop->name
])

@section('content')

        <h2>{{ $bookshop->name }}</h2>
        <h4>City: {{ $bookshop->city }}</h4>

        @foreach($bookshop->books as $book)

            <h4>{{ $book->title }}</h4>
            <p>{{ $book->pivot->stock }} pcs.</p>
            <img src="{{ $book->image }}">
            <br><br>

            <form action="{{ action('BookshopController@removeBook', $bookshop->id)}}" method="post">

                @csrf

                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <button type="submit">Remove</button>
            <br>
            <br>

            </form>

            <form action="{{ action('BookshopController@updateBookStock', $bookshop->id)}}" method="post">

                @csrf

                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="number" name="stock" value="{{ $book->pivot }}">
                <button type="submit">Update</button>
            <br>
            <br>

            </form>

        @endforeach
        <br><br>

        <form action="{{ action('BookshopController@addBook', $bookshop->id) }}" method="post">
            @csrf

            <select name="book_id" id="book_id">
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            <br><br>

            <label>No. of Book:</label>
                <input type="number" name="stock" value="{{ $book->pivot }}">
            <br>
            <br>

            <button type="submit">Add</button>
            <br>
            <br>
        </form>

@endsection