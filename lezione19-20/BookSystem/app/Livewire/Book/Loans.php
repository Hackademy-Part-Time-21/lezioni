<?php

namespace App\Livewire\Book;

use Livewire\Component;

class Loans extends Component
{
    public $book;
    public function render()
    {
        return view('livewire.book.loans');
    }
}
