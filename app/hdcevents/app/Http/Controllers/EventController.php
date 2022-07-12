<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
    
        return view('welcome', ['events' => $events]);
    }
    
    public function create()
    {
        return view('events.create');
    }
    
    public function store(Request $request)
    {
        // Instânciando o Model de Evento
        $event = new Event;
        
        /* Passando para o Model os dados */
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        
        $event->save();
        
        // Redirecionando o usuário para uma página
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
}
