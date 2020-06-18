@extends('layouts.layout', [
    'title' => 'Create a Bookshop'
])

@section('content')

    <h1>Create a Bookshop</h1>

    <form action="{{ route('bookshops.store') }}" method="post">

    @csrf

    <label>

        <br>
        Name:<br><br>
        <input type="text" name="name" value="{{ old('name', $bookshop->name) }}">

        <br><br>
        City:<br><br>
        <input type="text" name="city" value="{{ old('city', $bookshop->city) }}">

    </label>
    <br>
    <br>

    <input type="submit" value="save">
    <br><br>

    </form>

    {{-- success message --}}
    @if (Session::has('success_message'))
 
    <div class="alert alert-success">
    {{ Session::get('success_message') }}
    </div>
    @endif

    {{-- error message --}}
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@endsection