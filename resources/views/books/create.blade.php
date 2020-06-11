<form method="post" action="/books">

  @csrf

  <div>
    <label>Title</label>
    <input type="text" name="title">
  </div>
  <br>

  <div>
    <label>Authors</label>
    <input type="text" name="authors">
  </div>
  <br>

  <div>
    <label>Image</label>
    <input type="text" name="image">
  </div>
  <br>

    <button type="submit">Save my new book!</button>

</form>

