<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{

    public function articoli(){
        $articoli = Article::latest()->paginate(6); // estrae tutti gli articoli della tabella articles

        return view('articoli',compact('articoli'));
    }

    public function articolo($id){
        $articolo = Article::findOrFail($id); 
        return view('articolo',compact('articolo'));
    }


    public function articoliPerCategoria(Category $category){
        $articoli = $category->articles()->paginate(6); // utilizzando articles() possiamo concatenare anche le altre funzioni
        $name=$category->name;
        return view('articoli',compact('articoli','name'));
    }


    public function articoliPerUtente(User $user){
        $articoli = $user->articles()->paginate(6); // utilizzando articles() possiamo concatenare anche le altre funzioni
        $name=$user->name;
        return view('articoli',compact('articoli','name'));
    }
    

    public function create(){

        return view('articoli.create');
    }

      public function store(StoreArticleRequest $request){

            // dd($request->all());

            if($request->hasFile('image')){
                //controlliamo che l'immagine sia valida (non corrotta)
                if($request->file('image')->isValid()){
                    //prima creo l'articolo
                    $article = Article::create([
                        'title'=>$request->input('title'),
                        'content'=>$request->input('content'),
                        'user_id'=>Auth::user()->id
                    ]);

                    $article->categories()->attach($request->input('categories')); // crea i record nella tabella pivot associando ogni category_id passato all'id dell'articolo

                    $article->image = $request->file('image')->storeAs('public/articles/'.$article->id,'cover.jpg'); //storeAs restituisce il path nel quale ha salvato l'immagine
                    $article->save();

                }else{
                    return 'Immagine non valida';
                }
            }else{

                $article = Article::create([
                    'title'=>$request->input('title'),
                    'content'=>$request->input('content'),
                    'user_id'=>Auth::user()->id
                ]);
                $article->categories()->attach($request->input('categories'));
            }


            return redirect()->back()->with(['success'=>'Articolo salvato con successo']);
        }


    public function edit(Article $article){

        //devo assicurarmi che questo articolo sia stato scritto dall'utente loggato

        $user = Auth::user();

        //recupero l'autore dell'articolo $article->user;
      
        if( $user->id == $article->user->id){
            return view('articoli.edit',compact('article'));
        }else{
            abort(403);
        }

    }

    public function update(Article $article,Request $request){
        // dd($request->all());
        $user = Auth::user();
        if( $user->id != $article->user->id){
            abort(403);
        }
        //Step 1 aggiorni i dati dell'articolo
        $article->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
        ]);

        // Step aggiornare le relazioni dell'articolo con la tabella categories
        $article->categories()->detach(); // elimina tutte le relazioni tra l'articolo e le categorie
        $article->categories()->attach($request->input('categories'));
        return redirect()->back()->with(['success'=>'Articolo aggiornato con successo']);

    }


    public function index(){
        $user = Auth::user(); // recuper l'utente attualmente loggato
        $articles= $user->articles; // prendo tutti gli articoli dell'utente
        return view('articoli.index',compact('articles'));
    }

    public function destroy(Article $article){
        $user = Auth::user();
        if( $user->id != $article->user->id){
            abort(403);
        }
        $article->categories()->detach();
        $article->delete();

        return redirect()->back()->with(['success'=>'Articolo aggiornato con successo']);

    }
    
}
