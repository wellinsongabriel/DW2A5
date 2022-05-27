<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function index(){
        $eventos = Evento::all();
        return view('welcome',['eventos'=>$eventos]);
    }

    public function criar(){
        return view('eventos.criar');
    }

    public function contato(){
        return view('contato');
    }

    public function produtos(){
        #query parameters http://127.0.0.1:8000/produtos?search=camisa
        $busca = request('search');
        return view('produtos',['busca'=>$busca]);
    }

    public function store(Request $request){
        $evento = new Evento;

        $evento->titulo = $request->titulo;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;

        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }
}
