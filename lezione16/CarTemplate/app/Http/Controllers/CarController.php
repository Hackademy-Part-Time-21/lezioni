<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=Car::paginate(5);
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car=Car::create($request->all());

        // alla car appena creata associamo l'array di extras scelti nel form alla relazione con la tabella extras
        // $car --> relazione() --> attach(l'array degli id da associare)

        // a lato pratico attach non fa altro che
        // per ogni id presente nell'array dato in input
        // creare un record con l'id dell'oggetto car e l'id dell'array

        //esempio pratico
        /*
            $car {id=1,name=Auto,.........}
            $request->input('extras') = [1,4,5]

            attach crea 3 record nella tabella pivot
            1° record = ['car_id' = 1 , 'extra_id'=1]
            2° record = ['car_id' = 1 , 'extra_id'=4]
            3° record = ['car_id' = 1 , 'extra_id'=5]

          */
        $car->extras()->attach($request->input('extras')); 

        return redirect()->route('cars.index')->with(['success'=>'Car created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->update($request->all());

        $car->extras()->detach();
        $car->extras()->attach($request->input('extras'));

        return redirect()->route('cars.index')->with(['success'=>'Car updated successfully.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->extras()->detach();
        $car->delete();
        return redirect()->route('cars.index')->with(['success'=>'Car deleted successfully.']);
    }
}
