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
        $articolo = Article::findOrFail($id); 
        return view('articolo',compact('articolo'));
    }


    public function articoliPerCategoria(Category $category){
        //$articoli = $category->articles; restituisce la collection degli articoli associati ad una categoria
        $articoli = $category->articles()->paginate(6); // utilizzando articles() possiamo concatenare anche le altre funzioni
        // dd($articoli);
        //$articoli= Article::where('category_id','=',$category->id)->paginate(6);
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

            //dd($request->all());

            if($request->hasFile('image')){
                //controlliamo che l'immagine sia valida (non corrotta)
                if($request->file('image')->isValid()){
                    //prima creo l'articolo
                    $article = Article::create([
                        'title'=>$request->input('title'),
                        'content'=>$request->input('content'),
                        'category_id'=>$request->input('category_id'),
                        'user_id'=>Auth::user()->id
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
                    'category_id'=>$request->input('category_id'),
                    'user_id'=>Auth::user()->id
                ]);
            }


            return redirect()->back()->with(['success'=>'Articolo salvato con successo']);
        }
    
}
