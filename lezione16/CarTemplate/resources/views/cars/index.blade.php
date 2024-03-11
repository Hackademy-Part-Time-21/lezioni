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
            <th>Model</th>
            <th>Kw</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
        <tr>
            <td>{{ $car->name }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->kw }}</td>
            <td>{{ $car->price }}</td>
            <td>
                <a href="{{route('cars.show',$car)}}" class="btn btn-outline-primary">Show</a>
                <a href="{{route('cars.edit',$car)}}" class="btn btn-outline-secondary">Edit</a>
                <form action="{{route('cars.destroy',$car)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
    {{$cars->links()}}
</table>
</x-main>
