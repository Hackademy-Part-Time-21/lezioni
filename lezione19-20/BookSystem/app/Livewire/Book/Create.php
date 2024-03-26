<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Author;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\File;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:150')] 
    public $title;

    #[Validate('required|min:3|max:150')] 
    public $genre;

    #[Validate('required')] 
    public $description;

    public $authors;

    #[Validate('required|exists:authors,id')] 
    public $author_id;

    #[Validate('required|image')]
    public $cover;

    public function store(){

        $this->validate();

       $book= Book::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'genre'=>$this->description,
            'author_id'=>$this->author_id,
        ]);

        $path ='public/books/'.$book->id;

        $book->cover=$this->cover->storeAs(path:  $path, name: 'cover.jpg');
        $book->save();

        // $author = Author::find($this->author_id); // prendo l'autore selezionato
        // $author->books->create([
        //     'title'=>$this->title,
        //     'description'=>$this->description,
        //     'genre'=>$this->description,
        // ]);

        $this->formreset();

        File::deleteDirectory(storage_path('/app/livewire-tmp'));
        
        session()->flash('success','Book Created');

    }

    public function formreset(){
        $this->title='';
        $this->genre='';
        $this->description='';
        $this->author_id='';
        $this->cover='';
    }


    public function mount(){
        $this->authors=Author::all();
    }

    public function render()
    {
    
        return view('livewire.book.create');
    }
}
