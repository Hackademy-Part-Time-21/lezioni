<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $extras = Extra::all();
       return view('extras.index',compact('extras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('extras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Extra::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);

        return redirect()->back()->with(['success'=>'Extra created']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Extra $extra)
    {
        return view('extras.show',compact('extra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extra $extra)
    {
        return view('extras.edit',compact('extra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extra $extra)
    {
        $extra->update([
            'name'=> $request->input('name'),
            'description'=>$request->input('description'),

        ]);
        return redirect()->back()->with(['success'=>'Extra updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extra $extra)
    {
        $extra->cars()->detach(); // elimina tutti i record nella tabella pivot che sono collegati a questo extra
        $extra->delete();
        return redirect()->back()->with(['success'=>'Extra deleted']);

    }
}
