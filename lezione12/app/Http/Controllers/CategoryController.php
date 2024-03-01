<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Prendere tutti i record della risorsa
        //$categories=Category::all();
        $categories=Category::orderBy('updated_at','DESC')->paginate(5);

        //restituisco la vista con tutte le categorie

        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        /*
            Validation
        */

        Category::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')
        ]);
        // Category::create($request->all());


        return redirect()->back()->with(['success'=>'Categoria creata correttamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')
        ]);

        // $category->update($request->all());

        return redirect()->back()->with(['success'=>'Categoria modificata correttamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //

        $category->delete(); // elimino la categoria dala tabella categories del mio database
        return redirect()->back()->with(['success'=>'Categoria Eliminata correttamente']);

    }
}
