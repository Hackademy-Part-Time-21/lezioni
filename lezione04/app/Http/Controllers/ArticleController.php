<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public $articles = [
        ['title'=>'Articolo 1','content'=>'Testo 1' ,'id'=>0],
        ['title'=>'Articolo 2','content'=>'Testo 2','id'=>1],
    ];




    public function articoli(){
        $temp_articoli = $this->articles; //variabile temporanea per gli articoli
        
        return view('articoli',compact('temp_articoli'));
    }

    public function articolo($id){
        $articolo = $this->articles[$id];
        return view('articolo',compact('articolo'));
    }
}
