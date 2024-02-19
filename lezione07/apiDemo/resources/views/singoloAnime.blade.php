<x-layout>

    <h1>
        {{$anime['title']}}
    </h1>
    <img src="{{$anime['images']['jpg']['image_url']}}" alt="">

    <p> {{$anime['synopsis']}}</p>
</x-layout>