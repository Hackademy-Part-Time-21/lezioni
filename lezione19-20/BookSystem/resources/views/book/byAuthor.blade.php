<x-layout>
  
    <h1>Book By {{$author->name}} {{$author->surname}}</h1>
    <div class="row">
    @if ($author->books->count()>0)
        @foreach ($author->books as $book)
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{$book->title}}</h5>
                <h6 class="card-title">{{$book->genre}}</h6>
                <p class="card-text">{{$book->description}}</p>

                <a href="{{route('booksByAuthor',$book->author->id)}}" class="card-text">{{$book->author->name}} {{$book->author->surname}}</a>
                <a href="{{route('books.show',$book)}}" class="btn btn-primary"> Show More</a>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <h1>Non ci sono libri</h1>
    @endif

  
  </div>
  </x-layout>