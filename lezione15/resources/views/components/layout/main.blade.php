<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css','resources/js/app.js'])
        <title>Home</title>
    </head>
<body>
<x-navbar email="email@mail.it"/>


{{$slot}}


{{-- <x-footer email="email@mail.it" title="Titolo sito"/> --}}
</body>
</html>