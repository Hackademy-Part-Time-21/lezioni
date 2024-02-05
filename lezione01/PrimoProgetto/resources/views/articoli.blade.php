<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articoli</title>
</head>
<body>
    <h1>Articoli</h1>
    <ul>
        {{-- <li>{{$array_articoli[0]}}</li>
        <li>{{$array_articoli[1]}}</li>
        <li>{{$array_articoli[2]}}</li>
        <li>{{$array_articoli[3]}}</li>
        <li>{{$array_articoli[4]}}</li> --}}

        @foreach ($articoli as $articolo)
            <li>{{$articolo}}</li>
        @endforeach

    </ul>
</body>
</html>