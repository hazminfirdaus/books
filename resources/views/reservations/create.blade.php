@extends('layouts.layout', [
    'title' => 'Reserve a Book'
])

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <h2>Make a Reservation</h2>

    <form action="{{ action('ReservationController@store') }}" method="post">

        @csrf

        <label>Available Books: </label>

            <select name="book_id" id="book_id">
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                 @endforeach
            </select>
            <br><br>

        <label>From: </label>
        <input type="date" name="from" value="{{ old('from') }}">
        <br><br>

        <label>To: </label>
        <input type="date" name="to" value="{{ old('to') }}">
        <br><br>
        
        <input type="submit" value="Reserve">

    </form>

@endsection