@extends('layouts.layout', [
  'title' => 'List of Publishers'
])

@section('content')

<h1>Publishers Index</h1>

@foreach($publishers as $p)

  <h2>{{ $p->title }}</h2>
  
  @component('publishers.unordered-list')

  <ul>

    @foreach($p->books as $b)
      <li>{{ $b->title }}</li>
    @endforeach

  </ul>

  @endcomponent

    <a href="publishers/{{ $p->id }}">Read more...</a>

@endforeach

@endsection