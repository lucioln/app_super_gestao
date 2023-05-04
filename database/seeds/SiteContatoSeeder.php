<?php

use Illuminate\Database\Seeder;
use App\SiteContato;


class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Jorge';
        // $contato->telefone = '(98) 32222-2222';
        // $contato->email = 'liguetaxi@gmail.com';
        // $contato->motivo_contato = 3;
        // $contato->mensagem = 'Olá, pode me retornar no email?';
        // $contato->save();

        factory(SiteContato::class, 100)->create();
    }
}
