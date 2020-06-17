@extends('layouts.layout', [
    'title' => $book->title
])

@section('content')

    <div>
        <h1>{{ $book->title }}</h1>
        <p>{{ $book->authors }}</p>
        <img src="{{ $book->image }}"><br><br>
    </div>

    <div>  
        <form method="post" action="/add-to-cart">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="number" name="count">
            <button>Add to cart</button>
        </form>
        <br>
        <br>
    </div>

    <div>  

@auth
        <form class="review-form" method="post" action="{{ route('books.review', [ $book->id ]) }}">

            @csrf

            <h2>Add a review as {{ auth()->user()->name }}:</h2>

            <div class="form-group">
                Review: <br>
                <textarea name="text" cols="30" rows="10"></textarea>
            </div> <br>

            <div class='form-group'>
                Rating: <br>
                <input type="number" name='rating'>
            </div> <br>

            <div class='form-group'>
                <button>Submit review</button>
            </div>

        </form>
    </div>

    <br>
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

@else

    <h2>Please log in to submit a review.</h2>

@endauth

@guest
    
<p>You can login here: <a href="{{ route('login') }}">Login</a></p>

@endguest

    <div class="reviews">

            <h2>Reviews</h2>
        
            @foreach ($book->reviews as $review)
    
                <h3>{{ $review->text }}</h3>
                <div>Rating: {{ $review->rating }}</div>

                @can('delete_reviews')

                    <form action="{{ route('reviews.delete', [ $review->id ]) }}" method="post">
                        @method('delete')
                        @csrf

                        <input type="submit" value="Delete">
                    </form>

                @endcan
                
            @endforeach

    </div>

@endsection

