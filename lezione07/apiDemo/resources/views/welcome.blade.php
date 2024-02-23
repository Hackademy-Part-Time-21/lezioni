<x-layout>

    <h1>Home</h1>

    @foreach ($categorie as $categoria)
        <a href="{{route('animeByCategory',[$categoria['mal_id'],$categoria['name']])}}">{{$categoria['name']}}</a><br>
    @endforeach

</x-layout>