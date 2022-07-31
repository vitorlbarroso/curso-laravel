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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);

Route::get('/eventos/criar', [EventController::class, 'create'])->middleware('auth');
Route::get('/evento/{id}', [EventController::class, 'show']);
Route::post('/eventos', [EventController::class, 'store']);
Route::delete('/evento/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/evento/editar/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/eventos/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::get('/contato', function() {
    return view('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/eventos/participar/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

Route::delete('eventos/sair/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');