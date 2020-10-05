<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Mensagem;
use App\Models\Funcionario;

class MensagemValidatorTest extends TestCase
{
    public function testEnviarMensagemCaixaEntradaDestinatario() {
	    $f1 = Funcionario::find(1);
	    $f2 = Funcionario::find(2);

    	$qt1 = $f2->caixaEntrada()->count();
	    $mensagem = Mensagem::factory()->make();
   	$f1->enviarMensagem($mensagem->titulo, $mensagem->texto, $f2);
	    $qt2 = $f2->caixaEntrada()->count();
    	$this->assertEquals($qt1 + 1, $qt2);
   }


    public function testEnviarMensagemCaixaSaidaRemetente() {
        $f1 = Funcionario::find(1);
        $f2 = Funcionario::find(2);

        $qt1 = $f1->caixaSaida()->count();
        $mensagem = Mensagem::factory()->make();
        $f1->enviarMensagem($mensagem->titulo, $mensagem->texto, $f2);
        $qt2 = $f1->caixaSaida()->count();
        $this->assertEquals($qt1 + 1, $qt2);
    }

    /*    public function testEnviarMensagemCaixaSaidaRemetente() {
        $f1 = \App\Funcionario::find(1);
        $f2 = \App\Funcionario::find(2);

        $qt1 = $f1->caixaSaida()->count();
        $mensagem = factory(\App\Mensagem::class)->make();
        $f1->enviarMensagem($mensagem->titulo, $mensagem->texto, $f2);
        $qt2 = $f1->caixaSaida()->count();
        $this->assertEquals($qt1 + 1, $qt2);

       }



        public function testMensagemSemTitulo()
        {
        $this->expectException(\App\Validator\ValidationException::class);
            $mensagem = factory(\App\Mensagem::class)->make();
        $mensagem->titulo = "";
        $dados = $mensagem->toArray();

        \App\Validator\MensagemValidator::validate($dados);
        }

        public function testMensagemRemetenteIgualDestinatario()
        {
        $this->expectException(\App\Validator\ValidationException::class);
            $mensagem = factory(\App\Mensagem::class)->make();

        $mensagem->destinatario_id = $mensagem->funcionario_id;
        $dados = $mensagem->toArray();

        //$mensagem->destinatario()->associate($mensagem->remetente);

        \App\Validator\MensagemValidator::validate($dados);
        }*/
}
