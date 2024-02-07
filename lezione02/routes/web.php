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

// Route::get('/', function () {
//     $titolo = "Home";
//     $sottotitolo = "Benvenuti nella nostra pagina";
//     return view('pages.layout',compact('titolo','sottotitolo'));
// });

// Route::get('/chi-siamo', function () {
//     $titolo = "Chi Siamo";
//     return view('pages.layout',compact('titolo'));
     //return view('chi-siamo',['titolo'=>$titolo]);
// });


Route::get('/', function () {
    // $auth =[
    //     'name'=>'Giovanni',
    //     'email'=>'email@email.com'
    // ];
    
    $auth = [];
    return view('welcome',compact('auth'));
})->name('home');

Route::get('/lista-articoli', function () {

        $articoli = [
            [
                'titolo' => 'Titolo articolo 1',
                'autore' => 'Autore articolo 1',
                'testo' => 'Testo articolo 1'
            ],
            [
                'titolo' => 'Titolo articolo 2',
                'autore' => 'Autore articolo 2',
                'testo' => 'Testo articolo 2'
            ],
            [
                'titolo' => 'Titolo articolo 3',
                'testo' => 'Testo articolo 3',
            ]
        ];
        

    return view('articoli',compact('articoli'));
})->name('articoli');


Route::get('/articolo',function(){
    return view('articolo');
})->name('articolo');