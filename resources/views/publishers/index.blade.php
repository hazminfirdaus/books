@extends('layouts.layout', [
    'title' => 'List of publishers'
])

@section('content')

    <h1>Publishers Index</h1>

    @foreach($publishers as $p)
        <div>
            <h2>{{ $p->title }}</h2>

            <a href="{{ route('publishers.edit', [$p->id]) }}">Edit this publisher</a><br><br>


                    @foreach($p->books as $b)
                        <li>{{ $b->title }}</li>
                        <br><br>
                    @endforeach


            <a href="publishers/{{ $p->id }}">Read more...</a>
            <br><br><br>
        </div>
    @endforeach


    @component('publishers.unordered-list', [
        'what' => 'whatever'
    ])

        ANYTHING ELSE, WRAPPED IN THE COMPONENT

    @endcomponent

@endsection