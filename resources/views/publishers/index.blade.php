<h1 style="color: olive">Publishers Index</h1>

@foreach($publishers as $p)
  <h2>{{ $p->title }}</h2>
  <ul>

    @foreach($p->books as $b)
    <li>{{ $b->title }}</li>
    @endforeach
  </ul>
  <button>
    <a href="publishers/{{ $p->id }}">Read more...</a>
  </button>
@endforeach