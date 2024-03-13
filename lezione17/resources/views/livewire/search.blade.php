<div>
    <h1>Ricerca Articoli</h1>

    <div class="input-group mb-3">
        <span class="input-group-text" >Ricerca per titolo</span>
        <input type="text" class="form-control" wire:model.live="search">
    </div>

    <div class="container">
        <div class="row ">
            @foreach($articles as $article)
            <div class="col-4 my-3">
                <x-article-card :articolo="$article"/>
            </div>            
            @endforeach
        </div>
    </div>
</div>
