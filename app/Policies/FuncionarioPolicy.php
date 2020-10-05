<?php

namespace App\Policies;

use App\Models\Funcionario;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;


class FuncionarioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create() {
        return Auth::user()->departamento->nome == "RH";
    }
}
