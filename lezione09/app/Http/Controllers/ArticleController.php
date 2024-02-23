<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{





    public function articoli(){
        $articoli = Article::all(); // estrae tutti gli articoli della tabella articles
        return view('articoli',compact('articoli'));
    }

    public function articolo($id){
        //prendiamo l'articolo che ha come id il valore ricevuto in input
        //$articolo = Article::where('id','=',$id)->first();
        //$articolo = Article::find($id); //controlla che la colonna id è uguale alla variabile
        $articolo = Article::findOrFail($id); 
        return view('articolo',compact('articolo'));
    }

    public function create(){
        return view('articoli.create');
    }

    public function store(Request $request){
        dd($request->all());
        //creare un articolo con quei dati
        
        /*
        Metodo 1
        */

        Article::create([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
        ]);

        /*
        Metodo 2 
        Questo metodo è funzionante solo quando i nomi dei campi
        del form sono uguali ai nomi delle colonne
        */

        // Article::create($request->all());

        /*
        Metodo 3
        Con questo terzo approccio perdiamo lo scudo del mass assignment
        */
        
        // $article = new Article();
        // $article->title=$request->input('title');
        // $article->content=$request->input('content');
        // $article->save();
    }
}
