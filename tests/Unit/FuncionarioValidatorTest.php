<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Funcionario;
use App\Validator\FuncionarioValidator;
use App\Validator\ValidationException;

class FuncionarioValidatorTest extends TestCase
{

   public function testFuncionarioSemNome() {
        $this->expectException(ValidationException::class);
        $funcionario = Funcionario::factory()->make(['nome' => '']);
        //$funcionario->nome = "";
        FuncionarioValidator::validate($funcionario->toArray());
   }

    public function testFuncionarioSemDepartamento() {
	    $this->expectException(ValidationException::class);

        $funcionario = Funcionario::factory()->make(['departamento_id' => ""]);
        $dados = $funcionario->toArray();
        $dados['password'] = 'password';
        $dados['password_confirmation'] = 'password';
	    //$funcionario->departamento_id = "";
        FuncionarioValidator::validate($dados);
    }

    public function testFuncionarioCorreto() {
        $funcionario = Funcionario::factory()->make();
        $dados = $funcionario->toArray();
        $dados['password'] = 'password';
        $dados['password_confirmation'] = 'password';
        $dados['departamento_id'] = 1;
        $validator = FuncionarioValidator::validate($dados);
        $this->assertTrue(true);
    }
}
