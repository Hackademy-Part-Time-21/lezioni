<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Brand::create([
        'name'=> $request->input('name'),
       ]);
       return redirect()->back()->with(['success'=>'Brand created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('brands.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->update([
            'name'=>$request->input('name')
        ]);
        return redirect()->back()->with(['success'=>'Brand updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //controlliamo che non ci sono auto associate a quel brand
        // brand->bar prendo tutte le macchine di un brand
        // count restituisce il numero degli elementi della collezione o array
        // se il count > 0 allora vuol dire che esiste almeno un auto associata
        
        if($brand->cars->count()>0){
            return redirect()->back()->with(['error'=>'Cant delete the brand.']);
        }else{
            $brand->delete();
            return redirect()->back()->with(['success'=>'Brand deleted']);
        }


    }
}
