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
</div>

