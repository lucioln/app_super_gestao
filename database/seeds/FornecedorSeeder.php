<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'www.fornecedor100.com.br';
        $fornecedor->uf = 'MA';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        //método create() -> atencao ao filleble no Model
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'uf' => 'SP',
            'site' => 'www.fornecedor200.com.br',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        //INSERT
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'uf' => 'RJ',
            'site' => 'www.fornecedor300.com.br',
            'email' => 'contato@fornecedor300.com.br'
        ]);
    }
}
