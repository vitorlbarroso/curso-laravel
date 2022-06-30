<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $name = 'Pedro';
    
    $arr = [10,20,30,40,50];
    
    $names = ['Vitor', 'Evellyn', 'Gabriel', 'Julio', 'Valentina', 'Jussara'];

    return view('welcome', 
        [
            'name' => $name,
            'arr' => $arr,
            'names' => $names
        ]);
});

Route::get('/contato', function () {
    return view('contact');
});

Route::get('/produtos', function () {
    $search = request('search');
    return view('products', ['search' => $search]);
});

Route::get('/produto/{id}', function ($id = 1) {
    return view('product', ['id' => $id]);
});