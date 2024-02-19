<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    //

    public function search(Request $request){

        //
        /*
        ->all() => crea un array chiave valore
            $input = $request->all();
            $nome = $input['nome'];

        ->input('nome') => restitusce il valore associato ad una chiave
            $request->input('nome')
        */

        // prende il valore associato alla chiave nome del form
        $nome= $request->input('nome'); 

        //concatena il nome nell'uri dell'API e invia la richiesta get http
        $response = Http::get('https://api.jikan.moe/v4/anime?q='.$nome);       
        
        //converte i risultati da json a array chiave - valore
        $animeTrovati = $response->json(); 

        //La struttura di animeTrovati sarà di questo tipo
        /*
        $animeTrovati =
        [
            'pagination'=>....
            'data'=>.....
        ]
        */

       
        //restiutiamo la vista solo con le informazioni contenute nella chiave data
        return view('listaAnime',['anime'=>$animeTrovati['data']]);

        /*
            Se utilizziamo una return view all'interno di una funzione
            che gestisce la rcihiesta post ci sarà un problema
                - se l'utente prova ad aggiornare la pagina verrà inviata nuovamente la richiesta
                - gli utenti pericolosi potrebbero usare questo problema per sovracaricare il server

            Come lo risolviamo ?
                - Creiamo una rotta che avrà il compito di mostrare la lista dei risultati
                - Route::get('/lista-anime',[AnimeController::class,'listaAnime'])->name('anime-list');
                - modifichiamo il return di questa funzione in 
                    return redirect('lista-anime')->with('animeTrovati', $animeTrovati);

                - definiamo la funzione "listaAnime" che andrà a mostrare la vista 


                public function listaAnime(){
                    $animeTrovati = session('animeTrovati');
                    return view('listaAnime', ['anime'=>$animeTrovati['data']]);
                }

                In Laravel, la funzione session() è utilizzata per accedere ai dati memorizzati nella sessione dell'utente. 
                Le sessioni offrono un modo per conservare informazioni (in variabili) da utilizzare attraverso più pagine. 
                Laravel fornisce diversi modi per lavorare con i dati di sessione, consentendo di memorizzare, 
                recuperare e cancellare dati dalla sessione durante la vita di una sessione utente.

        */

  



    }


    public function animeById($id){


        /*
        1- Rendere dinamica l'api
            - concatenazione
        2- Rendere l'id della ricerca un parametro
            -rotta parametrica
            - collegare il tag <a> (il pulsante della card) nella vista  
        3- Mostrare il risultato
            - creaimo una vista

        */

        $response = Http::get('https://api.jikan.moe/v4/anime/'.$id);
        $anime=$response->json();

        /*
        $anime =
        [
            'data'=>.....
        ]
        */

        return view('singoloAnime',['anime'=>$anime['data']]);
    }








}
