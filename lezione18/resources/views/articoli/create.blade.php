<x-layout.main>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
@endif

  @if ($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>   
      @endforeach
    </ul>
  @endif

    <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{@old('title')}}" required>
          @error('title')
          <span class="small text-danger">{{$message}}</span>
          @enderror


        </div>

        <div class="form-floating">
          <textarea class="form-control @error('content') is-invalid @enderror" name="content" style="height: 100px" required>{{@old('content')}}</textarea>
          <label>Content</label>
          @error('content')
          <span class="small text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-3">
          <input type="file" name="image">
        </div>

        <select class="form-select" multiple name="categories[]">
          @foreach(\App\Models\Category::all() as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        @error('category_id')
          <span class="small text-danger">{{$message}}</span>
        @enderror


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
</x-layout.main>