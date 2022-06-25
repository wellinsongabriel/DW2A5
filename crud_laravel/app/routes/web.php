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
use App\Http\Controllers\ProdutoController;


Route::get('/', [ProdutoController::class, 'index']);

Route::get('/produtos/criar', [ProdutoController::class, 'criar'])->middleware('auth');

Route::post('/produtos', [ProdutoController::class, 'store']);


Route::get('/produtos/{id}', [ProdutoController::class, 'exibir']);


Route::post('/produtos/join/{id}', [ProdutoController::class, 'joinProduto'])->middleware('auth');


Route::get('/dashboard',[ProdutoController::class, 'dashboard'])->middleware('auth');

Route::get('/produtos/editar/{id}', [ProdutoController::class, 'editar'])->middleware('auth');

Route::put('/produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');

Route::delete('/produtos/{id}', [ProdutoController::class, 'apagar'])->middleware('auth');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
