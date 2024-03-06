<x-layout.main>
      <ul>
      @foreach ($contatti as $contatto)
      <li>{{$contatto['name']}} - {{$contatto['surname']}} - <a href="{{route('contact',$contatto['id'])}}">Vedi Contatto</a></li>
          
      @endforeach
    </ul>
</x-layout.main>