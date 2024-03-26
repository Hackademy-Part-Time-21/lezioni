<?php

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/books/author/{id}',[PageController::class,'booksByAuthor'])->name('booksByAuthor');

Route::get('/books/{book}/loan',[BookController::class,'loan'])->name('books.loan');
Route::get('/books/{book}/loans',[BookController::class,'loans'])->name('books.loan.index');

Route::resource('/books',BookController::class);

