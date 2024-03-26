<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','is_admin'])->except(['show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        Book::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'genre'=>$request->description,
            'author_id'=>$request->author_id,
        ]);

        return redirect()->back()->with(['success'=>'Book Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
    $authors = Author::all();
       return view('book.edit',compact('book','authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'genre'=>$request->description,
            'author_id'=>$request->author_id,
        ]);
        return redirect()->back()->with(['success'=>'Book Updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with(['success'=>'Book Deleted']);

    }

    public function loan(Book $book){
        return view('book.loan',compact('book'));
    }

    public function loans(Book $book){
        return view('book.loans',compact('book'));
    }
}
