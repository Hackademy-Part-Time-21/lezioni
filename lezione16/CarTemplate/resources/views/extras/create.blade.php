<x-main>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>    
    @endif
    <div class="row">
        <div class="col-12">
            <form action="{{ route('extras.store') }}" method="POST">
                @csrf
        
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>

                <div class="form-floating">
                    <textarea class="form-control" name="description"  id="floatingTextarea2" style="height: 100px">{{old('description')}}</textarea>
                    <label for="floatingTextarea2">Description</label>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
        
                <button type="submit" class="btn btn-primary">Create Extra</button>
            </form>
        </div>
    </div>

</x-main>