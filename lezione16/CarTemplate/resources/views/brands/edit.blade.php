<x-main>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>    
    @endif
    <div class="row">
        <div class="col-12">
            <form action="{{ route('brands.update',$brand) }}" method="POST">
                @csrf 
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name',$brand->name)}}" placeholder="Enter name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>
        
                <button type="submit" class="btn btn-primary">Update Brand</button>
            </form>
        </div>
    </div>

</x-main>