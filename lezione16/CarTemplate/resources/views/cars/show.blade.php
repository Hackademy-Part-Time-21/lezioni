<x-main>
    <div class="row my-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->name }}</h5>
                    <p class="card-text">Model: {{ $car->model }}</p>
                    <p class="card-text">Brand: {{ $car->brand->name }}</p>
                    <p class="card-text">Kw: {{ $car->kw }}</p>
                    <p class="card-text">Price: {{ $car->price }}</p>
                    <p class="card-text">Description: {{ $car->description }}</p>

                    <h3>Extras</h3>
                    <ul>
                        @foreach($car->extras as $extra)
                            <li>{{$extra->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


</x-main>

