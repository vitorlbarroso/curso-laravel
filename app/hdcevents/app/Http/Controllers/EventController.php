<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $name = 'Pedro';
    
        $arr = [10,20,30,40,50];
        
        $names = ['Vitor', 'Evellyn', 'Gabriel', 'Julio', 'Valentina', 'Jussara'];
    
        return view('welcome', 
            [
                'name' => $name,
                'arr' => $arr,
                'names' => $names
            ]);
    }
    
    public function create()
    {
        return view('events.create');
    }
}
