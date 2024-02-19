<x-layout>

    <div class="row">
      @foreach ($anime as $item)
        <div class="col-3">
          <div class="card" style="width: 18rem;">
              <img src="{{$item['images']['jpg']['image_url']}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$item['title']}}</h5>
                <p class="card-text">{{$item['synopsis']}}</p>
                <a href="{{route('animeById',$item['mal_id'])}}" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
      @endforeach

    </div>



</x-layout>