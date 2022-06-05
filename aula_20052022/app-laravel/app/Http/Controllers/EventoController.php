<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\User;

class EventoController extends Controller
{
    private function subirImagem(Request $request, Evento $evento): void{
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extensao;
            $requestImagem->move(public_path('img/eventos'),$nomeImagem);
            $evento->imagem = $nomeImagem;
        }
    }
        
    public function index(){
        $search = request('search');

        if($search){
            $eventos = Evento::where([
                    ['titulo','like','%'.$search.'%']
            ])->get();
        }else{
            $eventos = Evento::all();
        }
        
        return view('welcome',['eventos'=>$eventos, 'search'=>$search]);
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
        $evento->data = $request->data;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;
        $evento->items = $request->items;

        //upload imagem
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extensao;
            $requestImagem->move(public_path('img/eventos'),$nomeImagem);
            $evento->imagem = $nomeImagem;
        }
        $user = auth()->user();
        $evento->user_id = $user->id;

        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }
    public function mostrar($id){
        $evento = Evento::findOrFail($id);
        $user = auth()->user();
        $hasUserJoined = false;
        if($user){
            $userEvents = $user->eventoAsParticipant->toArray();
            foreach($userEvents as $userEvent){
                if($userEvent['id']==$id){
                    $hasUserJoined = true;
                }
            }
        }
        $eventOwner = User::where('id', $evento->user_id)->first()->toArray();

        return view('eventos.mostrar',['evento'=>$evento, 'eventOwner'=>$eventOwner, 'hasUserJoined'=>$hasUserJoined]);
    }

   
    public function dashboard() {

        $user = auth()->user();

        $eventos = $user->eventos;

        $eventoAsParticipant = $user->eventoAsParticipant;

        return view('eventos.dashboard', ['eventos' => $eventos, 'eventoAsParticipant'=>$eventoAsParticipant]);

    }
    public function destroy($id){
        Evento::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso');
    }

    public function editar($id){
        $user = auth()->user();
        $evento = Evento::findOrFail($id);
        //para evitar que qualquer usuario edite um evento
        if($user->id!=$evento->user_id){
            return redirect('/dashboard');
        }
        return view('eventos.editar', ['evento'=>$evento]);
    }

    public function update(Request $request){

        $data = $request->all();
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extensao;
            $requestImagem->move(public_path('img/eventos'),$nomeImagem);
            $data['imagem'] = $nomeImagem;
        }
    
        Evento::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso');
    }

    public function joinEvento($id){
        $user = auth()->user();

        $user->eventoAsParticipant()->attach($id);
        
        $evento = Evento::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento '.$evento->titulo);
    }

    public function leaveEvento($id){
        $user = auth()->user();
        $user->eventoAsParticipant()->detach($id);
        $evento = Evento::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento '.$evento->titulo);
    }
}

