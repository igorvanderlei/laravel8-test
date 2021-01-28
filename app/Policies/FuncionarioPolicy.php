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

    public function create( ) {
        if(Auth::user()->departamento->nome == "RH")
            return true;
        else
            return false;
    }

    public function update(Funcionario $funcionario) {
        if( Auth::user()->id == $funcionario->id || 
            Auth::user()->departamento->nome == "RH")
            return true;
        else
            return false;

    }


}
