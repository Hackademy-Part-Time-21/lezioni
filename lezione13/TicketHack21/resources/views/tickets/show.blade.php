<x-main>

    <h1>{{$ticket->subject}}</h1>

    <p>{{$ticket->description}}</p>

    <img src="{{Storage::url($ticket->image)}}" alt="">

</x-main>