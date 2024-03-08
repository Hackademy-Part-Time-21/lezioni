<x-layout.main>

    <img src="{{Storage::url($articolo->image)}}">
    <h1> {{$articolo->title}} </h1>
    
    @foreach($articolo->categories as $category)
        <a href="{{route('articoliPerCategoria',$category)}}">{{$category->name }}</a> 
    @endforeach
    <p> {{$articolo->content}}</p>
</x-layout.main>