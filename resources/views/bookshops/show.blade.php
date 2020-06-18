@extends('layouts.layout', [
    'title' => $bookshop->name
])

@section('content')

        <h3>{{ $bookshop->name }}</h3>
        <h4>City: {{ $bookshop->city }}</h4>

        @foreach($bookshop->books as $book)

            <p>{{ $book->title }}</p>

        @endforeach

@endsection