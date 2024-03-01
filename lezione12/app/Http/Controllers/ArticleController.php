<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    // public function __construct(){
    //      $this->middleware('auth');
    //     $this->middleware('auth')->except('articoli','articolo');
    //     $this->middleware('auth')->only('create','store');
    // }

    public function articoli(){
        $articoli = Article::latest()->paginate(6); // estrae tutti gli articoli della tabella articles

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

      public function store(StoreArticleRequest $request){

            //dd($request->all());

            //controllo se l'utente ha inserito l'immagine
            // se la richiesta ha un file contenuto nella chiave image == utene ha inviato l'immagine
            if($request->hasFile('image')){
                //controlliamo che l'immagine sia valida (non corrotta)
                if($request->file('image')->isValid()){

                    
                    /*Salvo l'immagine*/
                    //storeAs ha due parametri (il percorso nel quale salvare il file , il nome del file)
                    // il percorso parte sempre da storage/app/xyz --> noi possiamo scegliere solo quello da mettere al posto di xyz
                    // per rendere pubblico una parte dello storage ( app/public ) dobbiamo lanciare il comando php artisan storage:link
                    
                    

                    /*Dobbiamo rendere DINAMICO il path nel quale salviamo l'immagine 
                        - Deve essere dinamico --> che per ogni file deve essere diverso
                            - utilizzare il nome originale del file ( ma se due utenti hanno un file con lo stesso nome ?)
                            - Utilizzare l'id dell'articolo

                                -articles
                                    - 1 
                                        - cover.jpg
                                    - 2
                                        - cover.jpg
                                    - 3
                                        - cover.jpg
                                    - 4
                                        - cover.jpg

                            Per ogni articolo ci sarà la sua sottocartella (chiamata con il suo id) ( quindi utilizzare l'id dell'articolo per creare le 
                            sottocartelle della cartella articles)

                            Il path da creare? --> public/articles/$id_article

                    */

                    //prima creo l'articolo
                    $article = Article::create([
                        'title'=>$request->input('title'),
                        'content'=>$request->input('content'),
                    ]);

                    //soltato dopo aver creato l'articolo ho accesso al suo id
                    //$request->file('image')->extension();
                    $article->image = $request->file('image')->storeAs('public/articles/'.$article->id,'cover.jpg'); //storeAs restituisce il path nel quale ha salvato l'immagine
                    $article->save();

                }else{
                    return 'Immagine non valida';
                }
            }else{

                Article::create([
                    'title'=>$request->input('title'),
                    'content'=>$request->input('content'),
                ]);
            }


            return redirect()->back()->with(['success'=>'Articolo salvato con successo']);
        }
    
}
