<x-layout.main>
<h1>Crea Categoria</h1>

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
  </div>
@endif

<form method="POST" action="{{route('categories.store')}}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Nome della categoria</label>
      <input type="text" class="form-control" name="name">
      @error('name')
        {{$message}}
      @enderror
    </div>

    <div class="form-floating">
        <textarea class="form-control" name="description" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Descrizione</label>
        @error('description')
            {{$message}}
        @enderror
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</x-layout.main>