<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Funcionario;

class CadastrarFuncionarioTest extends TestCase
{

    public function inicializarArrayFuncionario() {
        $funcionario = Funcionario::factory()
            ->randomDepto(1, 6)
            ->make();
        $dados = $funcionario->toArray();
        $dados['password'] = "password";
        $dados['password_confirmation'] = "password";
        return $dados;
    }

    public function testUsuarioNaoLogadoAcessaForm()
    {
        $response = $this
            ->get('funcionario/create')
            ->assertStatus(403);
    }

    public function testFuncionarioLogadoNaoRHAcessaForm() {
        $funcionarioNRH = Funcionario::where('departamento_id', '!=', '1')
                            ->first();
        $response = $this
            ->actingAs($funcionarioNRH)
            ->get('funcionario/create')
            ->assertStatus(403);
    }

    public function testFuncionarioLogadoRHAcessaForm() {
        $funcionarioRH = Funcionario::where('departamento_id', '=', '1')
            ->first();
        $response = $this
            ->actingAs($funcionarioRH)
            ->get('funcionario/create')
            ->assertStatus(200);
    }

    public function testFuncionarioNaoLogadoEnviaForm() {
        $dados = $this->inicializarArrayFuncionario();
        $response = $this
            ->post('funcionario/create', $dados)
            ->assertStatus(403);
    }

    public function testFuncionarioLogadoNaoRHEnviaForm() {
        $funcionarioNRH = Funcionario::where('departamento_id', '!=', '1')
            ->first();
        $dados = $this->inicializarArrayFuncionario();
        $response = $this
            ->actingAs($funcionarioNRH)
            ->post('funcionario/create', $dados)
            ->assertStatus(403);
    }
    public function testFuncionarioLogadoRHEnviaForm() {
        $funcionarioRH = Funcionario::where('departamento_id', '=', '1')
            ->first();
        $dados = $this->inicializarArrayFuncionario();
        $response = $this
            ->actingAs($funcionarioRH)
            ->post('funcionario/create', $dados)
            ->assertStatus(200)
            ->assertSee('Funcionario criado');
    }
    public function testFuncionarioLogadoRHEnviaFormDadosIncompletos() {
        $funcionarioRH = Funcionario::where('departamento_id', '=', '1')
            ->first();
        $dados = $this->inicializarArrayFuncionario();
        $dados['departamento_id'] = "";
        $response = $this
            ->actingAs($funcionarioRH)
            ->post('funcionario/create', $dados)
            ->assertStatus(302)
            ->assertRedirect('funcionario/create')
            ->assertSessionHas('errors');
    }

}
