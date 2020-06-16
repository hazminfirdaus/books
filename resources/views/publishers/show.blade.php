@extends('layouts.layout', [
  'title' => $publisher->title
])

@section('content')

    <h1>Details of Publisher</h1>

    <h2>{{ $publisher->title }}</h2>

    @foreach($books as $b)
    <div>
        <p>{{ $b->title}}</p>
    </div>
    @endforeach

@endsection