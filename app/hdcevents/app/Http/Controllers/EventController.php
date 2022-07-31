<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');
        
        if ($search) {
            $events = Event::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $events = Event::all();
        }
    
        return view('welcome', ['events' => $events, 'search' => $search]);
    }
    
    public function show($id)
    {
        $event = Event::findOrFail($id);
        
        $user = auth()->user();
        $hasUserJoined = false;
        
        if ($user) {
            $userEvents = $user->eventsAsParticipants->toArray();
            
            foreach($userEvents as $userEvent) {
                if ($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }
        
        return view('events.show', ['event' => $event, 'hasuserjoined' => $hasUserJoined]);
    }
    
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        
        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
    }
    
    public function update(Request $request)
    {
        $data = $request->all();
        
        if ($request->hasFile('image') ** $request->file('image')->isValid()) {
            $requestImage = $request->image; // Pego os dados da imagem
            $extension = $requestImage->extension(); // Pego a extensão do arquivo
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension; // Seto um novo nome
            
            $requestImage->move(public_path('img/events'), $imageName); // Movo para a pasta de imagens de eventos
            
            $data['image'] = $imageName; // Defino o parâmetro a ser inserido no banco de dados
        }
        
        Event::findOrFail($request->id)->update($data);
        
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function store(Request $request)
    {
        // Instânciando o Model de Evento
        $event = new Event;
        
        /* Passando para o Model os dados */
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        
        /* Salvando imagem */
        if ($request->hasFile('image') ** $request->file('image')->isValid()) {
            $requestImage = $request->image; // Pego os dados da imagem
            $extension = $requestImage->extension(); // Pego a extensão do arquivo
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension; // Seto um novo nome
            
            $requestImage->move(public_path('img/events'), $imageName); // Movo para a pasta de imagens de eventos
            
            $event->image = $imageName; // Defino o parâmetro a ser inserido no banco de dados
        }
        
        $user = auth()->user();
        $event->user_id = $user->id;
        
        $event->save();
        
        // Redirecionando o usuário para uma página
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
    
    public function joinEvent($id)
    {
        $user = auth()->user();
        
        $user->eventsAsParticipants()->attach($id);
        
        $event = Event::findOrFail($id);
        
        return redirect('/dashboard')->with('msg', 'Sua presença no evento ' . $event->title . 'foi confirmada!');
    }
    
    public function leaveEvent($id)
    {
        $user = auth()->user();
        
        $user->eventsAsParticipants()->detach($id);
        
        $event = Event::findOrFail($id);
        
        return redirect('/dashboard')->with('msg', 'Sua presença no evento ' . $event->title . 'foi removida!');
    }
    
    public function create()
    {
        return view('events.create');
    }
    
    public function edit($id)
    {
        $user = auth()->user();
        $event = Event::findOrFail($id);
        
        if ($user->id != $event->user->id) {
            return redirect('/dashboard');
        }
        
        return view('events.edit', ['event' => $event]);
    }
    
    public function dashboard()
    {
         $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipants = $user->eventsAsParticipants;

        return view('events.dashboard', 
            ['events' => $events, 'eventsasparticipant' => $eventsAsParticipants]
        );
    }
}
