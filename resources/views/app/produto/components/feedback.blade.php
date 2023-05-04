@if(isset($_GET['msg']))
    @switch($_GET['msg'])
        @case('1')
            <p style="color:green">Produto Cadastrado com Sucesso!</p>
        @break
        @case('2')
            <p style="color:green">Produto Atualizado com Sucesso!</p>
            @break
        @case('3')
            <p style="color:red">Produto Removido com Sucesso!</p>
            @break
        @case('error')
            <p style="color:red">Erro ao realizar operação!</p>
            @break
    @endswitch
@endif
