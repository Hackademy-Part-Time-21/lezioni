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


    <h1>Lista Categorie</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Ultima modifica</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->updated_at}}</td>
                <td><a class="btn btn-primary" href="{{route('categories.show',$category)}}">Vedi</a>
                    <a class="btn btn-success" href="{{route('categories.edit',$category)}}">Modifica</a>
                    <form method="POST" action="{{route('categories.destroy',$category)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit"> Cancella </button>
                    </form>
                    
                </td>
              </tr>
            @endforeach

        </tbody>

      </table>
      {{$categories->links()}}

</x-layout.main>