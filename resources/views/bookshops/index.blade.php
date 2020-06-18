@extends('layouts.layout', [
    'title' => 'List of Bookshop'
])

@section('content')

    <h2>List of Bookshops</h2>

    @foreach ($bookshops as $bookshop)

        <h3>{{ $bookshop->name }}</h3>
        <h4>City: {{ $bookshop->city }}</h4>
        <br><br>
        
    @endforeach

    <a href={{ 'bookshop/create' }}>Create New</a>

@endsection