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
use App\Http\Controllers\EventoController;

Route::get('/', [EventoController::class, 'index']);
Route::get('/eventos/criar', [EventoController::class, 'criar'])->middleware('auth');//middleware('auth') para permitir somente para os usuarios logados criarem eventos
Route::get('/eventos/{id}', [EventoController::class, 'mostrar']);//show

//rota de post
Route::post('/eventos', [EventoController::class, 'store']);//store envia dodos pro banco

Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->middleware('auth');

Route::get('/eventos/editar/{id}', [EventoController::class, 'editar'])->middleware('auth');
Route::put('/eventos/update/{id}', [EventoController::class, 'update'])->middleware('auth');;

Route::get('/contato', [EventoController::class, 'contato']);

Route::get('/dashboard',[EventoController::class, 'dashboard'])->middleware('auth');

Route::get('/eventos/join/{id}', [EventoController::class, 'joinEvento'])->middleware('auth');

Route::delete('/eventos/leave/{id}', [EventoController::class, 'leaveEvento'])->middleware('auth');

//Route::get('/produtos', [EventoController::class, 'produtos']);

// Route::get('/contato', function () {
//     return view('contato');
// });

// Route::get('/produtos', function () {
//     #query parameters http://127.0.0.1:8000/produtos?search=camisa
//     $busca = request('search');
//     return view('produtos',['busca'=>$busca]);
// });

// Route::get('/produtos_teste/{id?}', function ($id=null) {
//     return view('produto', ['id'=>$id]);
// });

