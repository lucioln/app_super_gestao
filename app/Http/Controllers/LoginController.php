<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = $request->get('erro');
        return view('site.login',['erro'=> $erro]);
    }

    public function autenticar(Request $request){
       $regras = [
        'usuario' => 'email',
        'senha' => 'required'
       ];

       $feedback = [
        'usuario.email' => 'usuario (email) é obrigatório',
        'senha.required' => 'senha é obrigatório',
       ];

       $request->validate($regras, $feedback);
       $email = $request->get('usuario');
       $pass = $request->get('senha');

       $user = new User();

       $usuario = $user->where('email', $email)->where('password', $pass)->get()->first();

       if(($usuario->email === $email)&&($usuario->password)===$pass){
           session_start();
           $_SESSION['nome'] = $usuario->name;
           $_SESSION['email'] = $usuario->email;
           return redirect()->route('app.home');
       }else{
            return redirect()->route('site.login', ['erro'=> 1]);
       }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
