<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chi-siamo', function (){
    $utente = 'Hack-pt-21'; //creo una variabile con il nome dell'utente
    return view('chisiamo',['nomeUtente'=> $utente]); //la passo alla view
});


Route::get('/articoli', function (){
    $articoli = [
        'Articolo 1',
        'Articolo 2',
        'Articolo 3',
    ];

    $titolo = 'Lista Articoli';
    // die and dump --> stampa e blocca l'esecuzione
    //return view('articoli',['array_articoli'=> $articoli]);
    return view('articoli',compact('articoli'));//['articoli'=> $articoli]
    
});
