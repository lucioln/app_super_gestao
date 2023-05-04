<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SiteContato;
use App\MotivoContato;


class ContatoController extends Controller
{
    public function contato(){

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }



    public function salvar(Request $request){
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|min:15'
        ],[
            'nome.required' => "O campo 'nome' é obrigatório" ,
            'nome.min' => "'nome' deve possuir no mínimo 3 digitos",
            'nome.max' => "'nome' deve possuir no máximo 40 digitos",
            'telefone.required' => "O campo 'telefone' é obrigatorio",
            'email.email' => "E-mail inválido!",
            'required' => "O campo ' :attribute ' deve ser preenchido",
            'mensagem.min' => "O campo 'mensagem' deve possuir o minimo de 10 digitos"
        ]);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
