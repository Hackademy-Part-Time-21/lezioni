<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Email </th>
            <th scope="col">Titolo Libro</th>
            <th scope="col">Data Inzio Prestito</th>
            <th scope="col">Data Fine Prestito</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($book->users as $user)

          <tr>
            <th scope="row">{{$user->email}}</th>
            <td>{{$book->title}}</td>
            <td>{{$user->pivot->start_date}}</td>
            <td>{{$user->pivot->end_date}}</td>
          </tr>
              
          @endforeach


        </tbody>
      </table>
</div>
