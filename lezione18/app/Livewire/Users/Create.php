<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate; 

class Create extends Component
{

    public UserForm $form; //classe dedicata a gestire gli input di un form

    public function render()
    {
        return view('livewire.users.create');
    }
    

    public function store(){

        $this->form->save();
        // creaimo il messaggio flash da mostrare in caso di successo
        session()->flash('success','User successfully created.');

        //Invia un messaggio per informare gli altri componenti ( e in particolare users.index)
        // che è accaduto qualcosa e il ricevente deve rifare delle operazioni
        $this->dispatch('refreshUsers')->to('users.index');

        
    }
}
