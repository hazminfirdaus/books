@extends('layouts.layout', [
    'title' => 'Reservations'
])

@section('content')

    <h2>Reservations</h2>

    <table class="table table-striped">
        <tr>
        <th>Book</th>
        <th>User</th>
        <th>From</th>
        <th>To</th>
        </tr>
        </table>

    @foreach ($reservations as $reservation)

    <table>
        <tr>
        <th></th>
        <th>{{ $reservation->book->title }} </th>
        <th>{{ $reservation->user->name }} </th>
        <th>{{ $reservation->from }} </th>
        <th>{{ $reservation->to }} </th>
        <th></th>
        </tr>
        </table>
        
    @endforeach

@endsection