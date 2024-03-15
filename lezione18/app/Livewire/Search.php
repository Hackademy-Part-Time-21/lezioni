<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Url;    

class Search extends Component
{

    #[Url] 
    public $search='';

    public function render()
    {

        return view('livewire.search',
            [
                'articles'=>Article::where('title','like','%'.$this->search.'%')->get(),
                // 'articles'=>Article::all(),
            ]
        );


        /*

        Supponiamo di avere 3 articoli --> ['Articolo 1' ,'Articolo 2' , 'Articolo 3']


        Caso 1  where('title','like',$this->search)
        Se cerco Articolo -->  0
        Se cerco Articolo 1 --> 1 risultato


        Caso 2 where('title','like','%'.$this->search)

        Se cerco Articolo --> 0
        Se cerco Articolo 1 --> 1
        Se cerco rticolo 1 --> 1

        Caso 3 where('title','like',$this->search.'%')

        Se cerco Articolo --> 3
        Se cerco Articolo 1 --> 1
        Se cerco rticolo 1 --> 0

        Caso 4 where('title','like','%'.$this->search.'%')

        Se cerco Articolo --> 3
        Se cerco Articolo 1 --> 1
        Se cerco rticolo 1 --> 1

        */
      

        //where('title','like','%'.$this->search.'%')
        // se cerco arti

    }
}
