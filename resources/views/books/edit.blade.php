<h1>Edit form</h1>

<form method="post" action="/books/{{ $book->id }}">

  @csrf

  <div>
    <label>Title</label>
    <input type="text" name="title" value="{{ $book->title }}">
  </div>
  <br>

  <div>
    <label>Authors</label>
    <input type="text" name="authors" value="{{ $book->authors }}">
  </div>
  <br>

  <div>
    <label>Image</label>
    <input type="text" name="image" value="{{ $book->image }}">
  </div>
  <br>

    <button type="submit">Save my new book!</button>

</form>

