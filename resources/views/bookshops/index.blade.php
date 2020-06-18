@extends('layouts.layout', [
    'title' => 'List of Bookshop'
])

@section('content')

    <h2>List of Bookshop</h2>

    @foreach ($bookshops as $bookshop)

        <h3>{{ $bookshop->name }}</h3>
        <p>{{ $bookshop->city }}</p>
        <br><br>
        
    @endforeach

@endsection