<x-layout.main>

    <img src="{{Storage::url($articolo->image)}}">
    <h1> {{$articolo->title}} </h1>
    <h3> {{$articolo->category->name ?? 'Categoria non presente'}} </h3>
    <p> {{$articolo->content}}</p>
</x-layout.main>