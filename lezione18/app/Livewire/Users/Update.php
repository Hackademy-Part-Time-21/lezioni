<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate; 

class Update extends Component
{
    public $user;

    #[Validate('required')] 
    public $name;

    public $email;

    public $password;


    public function rules(){
        return [
            'email'=>[
                'required',
                'email',
                //controlla che la mail sia unica nella tabella users
                //ignorando quella dell'utente che stiamo modificando
                Rule::unique('users')->ignore($this->user), 
            ]
        ];
    }
    


    public function mount(){
        $this->name=$this->user->name;
        $this->email=$this->user->email;
        $this->password=null;
    }
    
    public function render()
    {
        return view('livewire.users.update');
    }

    public function update(){

        $this->validate();

        if($this->password){
            //Caso 2 Admin modifica la password
            $this->user->update([
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>$this->password
            ]);

        }else{
            //Caso 1 L'admin non modifica la password      
            $this->user->update([
                'name'=>$this->name,
                'email'=>$this->email,            
            ]);
        }

        session()->flash('success','User successfully updated.');

    }
}
