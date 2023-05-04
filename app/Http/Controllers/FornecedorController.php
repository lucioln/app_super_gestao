<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        if(!$request->input('site')){
            $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(10);
        }else{
            $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(10);
        }
        return view('app.fornecedor.listar', [
            'fornecedores' => $fornecedores,
            'request' => $request->all()
        ]);
    }

    public function adicionar(){
        return view('app.fornecedor.adicionar');redirect()->route('app.fornecedor');
    }

    public function gravar(Request $request){
        $msg = '';

        //Cadastrar
        if($request->input('_token')!= '' && $request->input('id') == ''){
        $regras = [
            'nome' => 'required',
            'email' => 'email',
            'uf' => 'required|min:2|max:2',
        ];

        $feedback = [
            'required' => 'O campo é obrigatório',
            'email' => 'Email invalido',
            'uf.min' => 'UF deve ter 2 digitos Exemplo: SP',
            'uf.max' => 'UF deve ter 2 digitos Exemplo: SP'
        ];

        $request->validate($regras, $feedback);

        $fornecedorNovo = $request->all();
        Fornecedor::create($fornecedorNovo);

        $msg = 'Fornecedor Cadastrado!';
        }
        //EDITAR
        if($request->input('_token')!= '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if($update){
                $msg = 'Atualizado com Sucesso!';
            }else{
                $msg = 'Erro ao realizar a atualização do registro!';
            }
        }
        return view('app.fornecedor.index', ['msg' => $msg]);
    }

    public function editar($id){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
    }

    public function excluir($id){
        $exclusao = Fornecedor::find($id)->delete();
        if($exclusao){
            $msg = 'Fornecedor excluído';
        }else{
            $msg = 'ERROR';
        }
        return view('app.fornecedor.index', ['msg' => $msg]);
    }
}

