<?php

namespace App\Livewire\Book;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Loan extends Component
{
    public $book;

    #[Validate('required|exists:users,email')]
    public $email;

    public function loan(){

        $user = User::where('email',$this->email)->first();

        $user->books()->attach($this->book->id,
            [
                'start_date'=>Carbon::now(),
            ]);

        session()->flash('success','Loan saved');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.book.loan');
    }
}
