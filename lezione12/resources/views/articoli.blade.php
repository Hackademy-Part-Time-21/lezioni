
<x-layout.main>

    <h1> I nostri articoli </h1>

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