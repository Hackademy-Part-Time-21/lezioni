<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count=0;

    
    public function render()
    {
        return view('livewire.counter');
    }


    //funzione per incrementare il contatore
    public function increment(){
        $this->count++;
    }

    public function decrement(){
        $this->count--;
    }

    public function azzera(){
        $this->count=0;
    }

    public function sum($number){
        $this->count = $this->count + $number;
    }

}
