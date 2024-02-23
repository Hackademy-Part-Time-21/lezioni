<x-layout.main>

    <form method="POST" action="{{route('article.store')}}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control">
        </div>

        <div class="form-floating">
            <textarea class="form-control" name="content" style="height: 100px"></textarea>
            <label>Content</label>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
</x-layout.main>