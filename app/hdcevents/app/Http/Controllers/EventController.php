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
        
        /* Salvando imagem */
        if ($request->hasFile('image') ** $request->file('image')->isValid()) {
            $requestImage = $request->image; // Pego os dados da imagem
            $extension = $requestImage->extension(); // Pego a extensão do arquivo
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension; // Seto um novo nome
            
            $requestImage->move(public_path('img/events'), $imageName); // Movo para a pasta de imagens de eventos
            
            $event->image = $imageName; // Defino o parâmetro a ser inserido no banco de dados
        }
        
        $event->save();
        
        // Redirecionando o usuário para uma página
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
}
