<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Validate;

class UserForm extends Form
{
    #[Validate('required',message:"Il nome è richiesto")] 
    public $name;

    #[Validate('required|email|unique:users')] 
    public $email;

    #[Validate('required')] 
    public $password;

    public function save(){
    //controlliamo che i dati inseriti nel form rispettano le regole
        $this->validate();

        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password
        ]);

    }
}
