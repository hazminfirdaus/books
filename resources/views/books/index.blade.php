@extends('layouts.layout', [
  'title' => 'List of Books'
])

@section('content')

<h1>Books Index</h1>

@foreach($books as $b)
<div>
  <h2>{{ $b->title}}</h2>
  <p>Authors: {{ $b->authors}}</p>

  <p>@if($b->publisher)
        Publisher: {{ $b->publisher->title }}
    @else
        Unknown
  @endif</p>
  
  {{-- <img src="{{ $b->image}}"><br><br> --}}
  <a href="books/{{ $b->id}}">Read more...</a>
</div>
@endforeach

@endsection