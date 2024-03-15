<x-layout.main>
    <h1>Modifica Categoria</h1>
    
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
    @endif

    @foreach($errors->all() as $error)
      {{$error}}
    @endforeach

    <form method="POST" action="{{route('categories.update',$category)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Nome della categoria</label>
          <input type="text" class="form-control" name="name" value="{{$category->name}}">
          @error('name')
            {{$message}}
          @enderror
        </div>
    
        <div class="form-floating">
            <textarea class="form-control" name="description" style="height: 100px">{{$category->description}}</textarea>
            <label for="floatingTextarea2">Descrizione</label>
            @error('description')
                {{$message}}
            @enderror
          </div>
    
    
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
    
    </x-layout.main>