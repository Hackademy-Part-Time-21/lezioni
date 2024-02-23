<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    //

    public function superheroes(){
        return view('superheroes');
    }

    public function welcome(){
        //concatena il nome nell'uri dell'API e invia la richiesta get http
        $response = Http::get('https://api.jikan.moe/v4/genres/anime');       
        
        //converte i risultati da json a array chiave - valore
        $categorie = $response->json()['data']; 

        return view('welcome',compact('categorie'));
    }
}
