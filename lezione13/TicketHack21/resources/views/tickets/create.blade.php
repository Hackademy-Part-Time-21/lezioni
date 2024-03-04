<x-main>

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif

    <form method="POST" action="{{route('tickets.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" value="{{old('subject')}}" >
            @error('subject')
                <span>{{$message}}</span>
            @enderror
        </div>
        
        <div class="mb-3">
            <div class="form-floating">
                <textarea class="form-control" name="description" style="height: 100px">{{old('description')}}</textarea>
                <label for="floatingTextarea2">Description</label>
              </div>
            @error('description')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Screenshot</label>
            <input class="form-control" name="image" type="file" id="formFile">
            @error('image')
                <span>{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</x-main>