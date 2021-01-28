<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CadastrarFuncionario extends Controller
{
    public function cadastrar(Request $request) {
        $this->authorize("create", \App\Models\Funcionario::class);

        try {
            \App\Validator\FuncionarioValidator::validate($request->all());
            $dados = $request->all();
            $dados['password'] = Hash::make($dados['password']);
            \App\Models\Funcionario::create($dados);
            return "Funcionario criado";
        } catch (\App\Validator\ValidationException $exception ) {
            $listaDepartamento = \App\Models\Departamento::all();

            return redirect('funcionario/create')

                ->with(["departamentos" => $listaDepartamento])
                ->withErrors($exception->getValidator())
                ->withInput();
        }


    }

    public function prepararCadastro() {
        $this->authorize("create", \App\Models\Funcionario::class);

        $listaDepartamento = \App\Models\Departamento::all();
        return view ("formCadastrarFuncionario")->with([
            "departamentos" => $listaDepartamento]);
    }
}
