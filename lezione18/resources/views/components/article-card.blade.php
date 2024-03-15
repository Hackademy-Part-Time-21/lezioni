<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{$articolo->title}}</h5>
        <p class="card-text">{{$articolo->content}}</p>

        @foreach($articolo->categories as $category)
            <a href="{{route('articoliPerCategoria',$category)}}">{{$category->name }}</a> 
        @endforeach

        @if(empty($articolo->user->name))
        <p>Utente non trovato</p>
        @else
        <br>
            <a href="{{route('articoliPerUtente',$articolo->user)}}">{{$articolo->user->name }}</a> 
        <br>
        @endif

        <a href="{{route('articolo',$articolo->id)}}" class="btn btn-primary">Apri Dettaglio</a>
    
    </div>
</div>

