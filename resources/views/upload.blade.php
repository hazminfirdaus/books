@extends('layouts.layout', [
    'title' => 'Upload'
])

@section('content')

    <h2>Upload a file</h2>

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

    <form action="{{ action('UploadController@upload') }}" method="post" enctype="multipart/form-data">
        @csrf 

        <br>
        <input type="file" name="file" style="background: white">
        <button type="submit">Upload</button>


    </form>

@endsection