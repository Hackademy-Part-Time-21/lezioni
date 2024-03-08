<x-layout.main>
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
      </div>
    @endif


    <h1>Lista Articoli</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Ultima modifica</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->updated_at}}</td>
                <td><a class="btn btn-success" href="{{route('articolo.edit',$article)}}">Modifica</a>                  
                    <form action="{{route('articolo.destroy',$article)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">ELIMINA</button>

                    </form>
                    
                </td>
              </tr>
            @endforeach

        </tbody>

      </table>


</x-layout.main>