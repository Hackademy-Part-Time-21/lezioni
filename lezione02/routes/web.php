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
           1=> [
                'id'=>1,
                'titolo' => 'Titolo articolo 1',
                'autore' => 'Autore articolo 1',
                'testo' => 'Testo articolo 1'
            ],
           2=> [
                'id'=>2,
                'titolo' => 'Titolo articolo 2',
                'autore' => 'Autore articolo 2',
                'testo' => 'Testo articolo 2'
            ],
           3=> [
                'id'=>3,
                'titolo' => 'Titolo articolo 3',
                'testo' => 'Testo articolo 3',
            ]
        ];
        

    return view('articoli',compact('articoli'));
})->name('articoli');


Route::get('/articolo/{id}',function($id){
    //prendo il parametro id
    
    $articoli = [
        1=> [
             'titolo' => 'Titolo articolo 1',
             'autore' => 'Autore articolo 1',
             'testo' => 'Testo articolo 1'
         ],
        2=> [
             'titolo' => 'Titolo articolo 2',
             'autore' => 'Autore articolo 2',
             'testo' => 'Testo articolo 2'
         ],
        3=> [
             'titolo' => 'Titolo articolo 3',
             'testo' => 'Testo articolo 3',
         ]
     ];

     //controllo se l'id passato nel parametro della rotta è presente nell'array (come chiave)
     if(array_key_exists($id,$articoli)){
        //prendo l'articolo con id uguale alla chiave
        $articolo = $articoli[$id];
        //restiuisco la view con l'articolo selezionato
        return view('articolo',compact('articolo'));
     }else{
        abort(404); // forzo laravel a mostrare l'errore 404
     }




})->name('articolo');



// Route::get('/articolo/edit',function(){
//     return 'modifica articolo';
// });



// Route::get('/articolo/edit',function(){
//     return 'modifica articolo';
// });

// Route::get('/articolo/show',function(){
//     return 'modifica articolo';
// });

// Route::get('/articolo/delete',function(){
//     return 'modifica articolo';
// });


// Route::prefix('articolo')->group(function () {
//     Route::get('/edit', function () {

//     });

//     Route::get('/show', function () {

//     });

//     Route::get('/delete', function () {

//     });
// });