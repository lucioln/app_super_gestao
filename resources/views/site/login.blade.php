@extends('site.layouts.basico')
@section('titulo', 'Super Gestão - Login')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                @if ($erro == 2)
                    <p style="color:red">Acesso negado! Você precisa se autenticar! </p>
                @endif
                <form action="{{route('site.login')}}" method="POST">
                @csrf
                @method('POST')
                <input name="usuario" value="{{old('usuario')}}" type="text" placeholder="Usuário" class="borda-preta">



                <input name="senha" type="password" placeholder="Senha" class="borda-preta">


                <button type="submit" style="background-color: rgb(0, 87, 159)">Entrar</button>
                </form>
            </div>
            @if ($erro == 1)
                <p style="color:red">Usuario ou Senha não existem! </p>
            @endif
            <p style="color:red">{{$errors->has('usuario') ? $errors->first('usuario') : ''}}</p>
            <p style="color:red">{{$errors->has('senha') ? $errors->first('senha') : ''}}</p>
        </div>
    </div>

    @include('site.layouts._partials.footer')
@endsection
