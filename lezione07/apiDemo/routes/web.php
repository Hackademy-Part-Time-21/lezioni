<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\PageController;

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


Route::post('/search',[AnimeController::class,'search'])->name('search');

Route::get('/animeById-{id}',[AnimeController::class,'animeById'])->name('animeById');

Route::get('/superheroes',[PageController::class,'superheroes']);





