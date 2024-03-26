<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Author;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;
    public $book;

    #[Validate('required|min:3|max:150')] 
    public $title='titolo';

    #[Validate('required|min:3|max:150')] 
    public $genre;

    #[Validate('required')] 
    public $description;

    #[Validate('required|exists:authors,id')] 
    public $author_id;

    #[Validate('image')]
    public $cover;

    public $old_cover;

    public $authors;


    public function update(){
        $this->validate();
        $this->book->update([
            'title'=>$this->title,
            'description'=>$this->description,
            'genre'=>$this->description,
            'author_id'=>$this->author_id,
        ]);

        if($this->cover){
            $path ='public/books/'.$this->book->id;
            $this->book->cover=$this->cover->storeAs(path:  $path, name: 'cover.jpg');
            $this->book->save();
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->formreset();
        
        session()->flash('success','Book Updated');

    }

    public function deleteCover(){
        Storage::delete($this->old_cover);
        $this->book->cover = null;
        $this->book->save();
        $this->old_cover='';
    }

    public function formreset(){
        $this->title='';
        $this->genre='';
        $this->description='';
        $this->author_id='';
        $this->cover='';
    }


    public function mount(){
        $this->authors = Author::all();
        $this->title = $this->book->title;
        $this->genre = $this->book->genre;
        $this->description = $this->book->description;
        $this->author_id = $this->book->author_id;
        $this->old_cover = $this->book->cover;
    }
    
    public function render()
    {

        return view('livewire.book.edit');
    }
}
