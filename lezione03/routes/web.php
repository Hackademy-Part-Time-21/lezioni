<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;

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


Route::get('/',[PageController::class,'home'])->name('home');

Route::get('/chi-siamo',[PageController::class,'chisiamo'])->name('chisiamo');


Route::get('/contacts',[PageController::class,'contatti'])->name('contacts');


Route::get('/contact/{id}',[PageController::class,'contatto'])->name('contact');


/*

Dobbiamo realizzare una pagina che mostra tutti gli articoli e l'utente deve essere in grado
di accedere ai dettagli dell'articolo attraverso un pulsante

?- una pagina che mostra tutti gli articoli
    - view V
    - controller ( ArticleController ) V
    - rotta V
        - uri V
        - metodo V
    - dati V

?- una pagina per il dettaglio dell'articolo
    - view 

    - rotta parametrica(id)
        - uri
        - metodo
    - aggiungere gli id


*/

Route::get('/articoli',[ArticleController::class,'articoli'])->name('articoli');

Route::get('/articolo/{id}',[ArticleController::class,'articolo'])->name('articolo');