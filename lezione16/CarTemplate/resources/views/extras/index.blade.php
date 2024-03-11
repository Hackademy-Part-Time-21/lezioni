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
        @foreach ($extras as $extra)
        <tr>
            <td>{{ $extra->name }}</td>
            <td>
                <a href="{{route('extras.show',$extra)}}" class="btn btn-outline-primary">Show</a>
                <a href="{{route('extras.edit',$extra)}}" class="btn btn-outline-secondary">Edit</a>
                <form action="{{route('extras.destroy',$extra)}}" method="POST">
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
