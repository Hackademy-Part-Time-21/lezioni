<x-main>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Subject</th>
            <th scope="col">Priority</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)

            <tr>
                <th scope="row">{{$ticket->id}}</th>
                <td>{{$ticket->subject}}</td>
                <td>
                    @if($ticket->priority==1)
                        Bassa
                    @elseif($ticket->priority==2)
                        Media
                    @else
                        Alta
                    @endif                
                </td>
                <td>                    
                @if($ticket->status==1)
                    Aperto
                @elseif($ticket->status==2)
                    In Lavorazione
                @else
                    Chiuso
                @endif     
                    
                </td>
                <td>{{$ticket->created_at}}</td>

                <td>
                    <a href="{{route('tickets.show',$ticket)}}" class="btn btn-primary">Show</a>
                    <a href="{{route('tickets.edit',$ticket)}}" class="btn btn-success">Edit</a>
                    {{-- Auth::user()->is_admin --}}
                    @if(auth()->user()->is_admin)
                    <form method="POST" action="{{route('tickets.destroy',$ticket)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                    @endif
                </td>

            </tr>

            @endforeach


        </tbody>
      </table>
</x-main>