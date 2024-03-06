
<x-layout.main>
    @if(Route::currentRouteName()=='articoli')
    <h1> I nostri articoli </h1>
    @else
    <h1> Risultati per {{$name}} </h1>
    @endif

    <div class="container">
        <div class="row ">
            @foreach($articoli as $articolo)
            <div class="col-4 my-3">
                <x-article-card :articolo="$articolo"/>
            </div>            
            @endforeach
        </div>
        {{$articoli->links()}}
    </div>

</x-layout.main>