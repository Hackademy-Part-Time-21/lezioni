<x-layout>
  <x-success-message/>
    <a class="btn btn-primary" href="{{route('books.create')}}">Create Book</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Gnre</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td>{{$book->title}}</td>
                <td>{{$book->genre}}</td>
                <td>
                  <a class="btn btn-success" href="{{route('books.edit',$book)}}">Edit</a>
                  <a class="btn btn-primary" href="{{route('books.show',$book)}}">Show</a>
                  <a class="btn btn-info" href="{{route('books.loan',$book)}}">Loan Book</a>
                  <a class="btn btn-secondary" href="{{route('books.loan.index',$book)}}">Loans</a>


                  <form method="POST" action="{{route('books.destroy',$book)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>

                </td>
              </tr>
            @endforeach

          
        </tbody>
      </table>

</x-layout>