<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::latest()->get();
        return view('tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'subject'=>$request->input('subject'),
            'description'=>$request->input('description'),
        ]);

        //controllo che la richiesta ha un file chiamato image
        if($request->hasFile('image')){
            //dd($request->file('image')->getClientOriginalName());
            //dd($request->file('image')->extension());
            $ticket->image=$request->file('image')->storeAs('public/tickets/'.$ticket->id,'cover.jpg');
            $ticket->save();
        }

        $mail = new NotificationMail($ticket->subject);
        Mail::to(Auth::user()->email)->send($mail);

        return redirect()->back()->with(['success'=>'Ticket creato correttamente']);


    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //se lo status è uguale a 1 questo vuol dire che il ticket è aperto
        if($ticket->status==1){

            if(Auth::user()->is_admin){
                //se l'utente è admin ha accesso alla modifica di tutti i campi
                $ticket->update([
                    'subject'=>$request->input('subject'),
                    'description'=>$request->input('description'),
                    'answer'=>$request->input('answer'),
                    'priority'=>$request->input('priority'),
                    'status'=>$request->input('status'),                    
                ]);
            }else{
                //se l'utente non è admin non ha accesso a tutti i campi
                $ticket->update([
                    'subject'=>$request->input('subject'),
                    'description'=>$request->input('description'),
                ]);
            }

                    //controllo che la richiesta ha un file chiamato image
            if($request->hasFile('image')){
                $ticket->image=$request->file('image')->storeAs('public/tickets/'.$ticket->id,'cover.jpg');
                $ticket->save();
            }
            return redirect()->back()->with(['success'=>'Ticket aggiornato correttamente']);

        }else{
            return redirect()->back()->with(['error'=>'Non puoi modificare un ticket in lavorazione o chiuso']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        Storage::delete($ticket->image);
        $ticket->delete();
        return redirect()->back()->with(['success'=>'Ticket creato correttamente']);

    }
}
