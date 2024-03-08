<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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

Route::get('/articoli',[ArticleController::class,'articoli'])->name('articoli');




Route::get('/articolo/{id}',[ArticleController::class,'articolo'])->name('articolo');


Route::get('/articoliPerCategory/{category}',[ArticleController::class,'articoliPerCategoria'])->name('articoliPerCategoria');

Route::get('/articoliPerUtente/{user}',[ArticleController::class,'articoliPerUtente'])->name('articoliPerUtente');

Route::get('/seeder', function(){
    //popolare la tabella articles

    //crea un record per la tabella articles
    //rispettando i vincoli del mass assignment ( protected $fillable nel modello)
    Article::create([
        'title'=>'Articolo 1',
        'content'=>'Testo 1'
    ]);

    Article::create([
        'title'=>'Articolo 2',
        'content'=>'Testo 2'
    ]);
});


/*
    Creare un form per inserire un articolo nel database
        - Form
            - rotta V
            - controller che mostra la vista V
            - blade del form V
            - rotta post che gestisce la creazione V
            - funzione nel controller che crea il Dato
            - aggiorniamo il form affinché invi i dati alla rotta corretta

*/

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/articles/create',[ArticleController::class,'create'])->name('article.create');
    Route::post('/articles/store',[ArticleController::class,'store'])->name('article.store');

    
    Route::get('/articolo/{article}/edit',[ArticleController::class,'edit'])->name('articolo.edit');

    Route::post('/articolo/{article}/update',[ArticleController::class,'update'])->name('articolo.update');

    Route::delete('/articolo/{article}/delete',[ArticleController::class,'destroy'])->name('articolo.destroy');

    Route::get('/articoli/index',[ArticleController::class,'index'])->name('articolo.index');
});



Route::resource('categories',CategoryController::class)->middleware('auth');

