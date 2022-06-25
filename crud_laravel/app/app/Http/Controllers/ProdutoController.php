<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\User;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::all();
        return view('welcome',['produtos'=>$produtos]);
    }

    public function criar(){
        $user = auth()->user();
        $acao = 'criar';
        $produtos = $user->produtos;

        $produtoAsParticipant = $user->produtoAsParticipant;
        return view('produtos.criar',['produtos'=>$produtos, 'produtoAsParticipant'=>$produtoAsParticipant, 'acao'=> $acao]);
    }


    public function store(Request $request){//store
        $produto = new Produto;

        $produto->id = $request->id;
        $produto->tipo =  $request->tipo;
        $produto->marca = $request->marca;
        $produto->tamanho = $request->tamanho;
        $produto->preco = $request->preco;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extensao;
            $requestImagem->move(public_path('images/produtos'),$nomeImagem);
            $produto->imagem = $nomeImagem;
        }
        $user = auth()->user();
        $produto->user_id = $user->id;
        //$user->produtoAsParticipant()->attach($produto->id);

        $produto->save();
        return redirect('/');
    }


    // public function exibir(){
    //     //$produtos = Produto::all();
    //     return view('produtos.exibir');
    // }

    public function exibir($id){
        $produto = Produto::findOrFail($id);
        $user = auth()->user();
       
        $eProprietario = false;
        $produtoOwner = User::where('id', $produto->user_id)->first()->toArray();
        if($user){                 
            if($produtoOwner){
                if($produtoOwner['id']==$user->id){
                    echo "<script>console.log(".$produtoOwner['id']." );</script>";
                    $eProprietario = true;
                }       
            }
        }
        

        return view('produtos.exibir',['produto'=>$produto,
         'produtoOwner'=>$produtoOwner, 'eProprietario'=>$eProprietario]);
    }

    public function dashboard() {

        $user = auth()->user();

        $produtos = $user->produtos;

        $produtoAsParticipant = $user->produtoAsParticipant;

        return view('produtos.dashboard', ['produtos' => $produtos, 'produtoAsParticipant'=>$produtoAsParticipant]);

    }
    
    public function joinProduto($id) {
        $user = auth()->user();

        $user->produtoAsParticipant()->attach($id);

        $produto = Produto::findOrFail($id);

    }
    

    public function editar($id){
        $user = auth()->user();
        $produto = Produto::findOrFail($id);
        $acao = 'editar';
        $produtos = $user->produtos;
        $produtoAsParticipant = $user->produtoAsParticipant;
        if($user->id!=$produto->user_id){
            return redirect('/dashboard');
        }
        return view('produtos.criar',['produto'=>$produto, 'produtos'=>$produtos, 
        'produtoAsParticipant'=>$produtoAsParticipant, 'acao'=>$acao]);
    }

    public function update(Request $request){
        $data = $request->all();
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;
            $extensao = $requestImagem->extension();
            $nomeImagem = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extensao;
            $requestImagem->move(public_path('images/produtos'),$nomeImagem);
            $data['imagem'] = $nomeImagem;
        }
    
        Produto::findOrFail($request->id)->update($data);

        return redirect('/dashboard');
    }


    public function apagar($id){
        
        Produto::findOrFail($id)->delete();

        return redirect('/dashboard');
    }
}
