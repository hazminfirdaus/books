@extends('layouts.layout', [
  'title' => 'Publisher Management'
])

@section('content')

<form action="{{ route('publishers.store') }}" method="post">
    @csrf
    <label>
      <br><br>
      Title:<br><br>
      <input type="text" name="title" value="{{ $publisher->title }}">

    </label>
    <br>
    <br>

    <input type="submit" value="save">

</form>

