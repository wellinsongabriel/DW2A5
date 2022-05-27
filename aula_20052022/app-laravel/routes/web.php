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
Route::get('/eventos/criar', [EventoController::class, 'criar']);

//rota de post
Route::post('/eventos', [EventoController::class, 'store']);
Route::get('/contato', [EventoController::class, 'contato']);

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