<?php

namespace App\Livewire\Users;

use Livewire\Component;

class Update extends Component
{
    public $user;

    public $name;
    public $email;
    public $password;

    public function mount(){
        $this->name=$this->user->name;
        $this->email=$this->user->email;

    }

    public function render()
    {
        return view('livewire.users.update');
    }
}
