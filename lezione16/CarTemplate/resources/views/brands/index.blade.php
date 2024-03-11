<x-main>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>    
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
             <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            <td>
                <a href="{{route('brands.show',$brand)}}" class="btn btn-outline-primary">Show</a>
                <a href="{{route('brands.edit',$brand)}}" class="btn btn-outline-secondary">Edit</a>
                <form action="{{route('brands.destroy',$brand)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>
</x-main>
