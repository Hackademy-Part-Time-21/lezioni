<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //funzione che restituisce la vista home
    public function home() {
        $books = Book::orderBy('created_at','desc')->paginate(10);
        return view('welcome',compact('books'));
    }

    public function booksByAuthor($id){
        $author = Author::findOrFail($id);

        return view('book.byAuthor',compact('author'));
    }
}
