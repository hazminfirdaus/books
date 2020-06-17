@extends('layouts.layout', [
    'title' => 'List of Authors'
])

@section('content')

    <h1>List of Authors</h1>

    <div class="list-of-authors">

        @foreach($authors as $author)
            <h2>{{ $author->name }}</h2>

                @foreach ($author->books as $book)

                    <li>
                        <h3>{{ $book->title }}</h3>
                        <img src="{{ $book->image }}" alt="">
                    </li>
                    
                @endforeach
        
            @endforeach

    </div>

@endsection