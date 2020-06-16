@extends('layouts.layout', [
  'title' => 'Publisher Management'
])

@section('content')

  @if ($publisher->id)
    {{-- edit --}}
    <form action="{{ route('publishers.update', [$publisher->id]) }}" method="post">
        @method('PUT')

    @else
    {{-- create --}}
    <form action="{{ route('publishers.store') }}" method="post">

  @endif

    @csrf

    <label>

        <br>
        Title:<br><br>
        <input type="text" name="title" value="{{ old('title', $publisher->title) }}">

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

