@extends('layouts.layout', [
    'title' => $bookshop->name
])

@section('content')

        <h3>{{ $bookshop->name }}</h3>
        <h4>City: {{ $bookshop->city }}</h4>

        @foreach($bookshop->books as $book)

            <h4>{{ $book->title }}</h4>
            <img src="{{ $book->image }}">
            <br><br>

            <form action="{{ action('BookshopController@removeBook', $bookshop->id)}}" method="post">

                @csrf

                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <button type="submit">Remove</button>

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
            <br>
            <br>

            <button type="submit">Add</button>
            <br>
            <br>
        </form>

@endsection