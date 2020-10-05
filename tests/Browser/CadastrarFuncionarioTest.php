<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Funcionario;

class CadastrarFuncionarioTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $funcionarioRH = Funcionario::where("departamento_id", '=', '1')->first();

        $this->browse(function (Browser $browser) use ($funcionarioRH) {
            $browser->visit('/login')
                ->type('nome', $funcionarioRH->nome)
                ->type('password', 'password')
                ->pause(2000)
                ->screenshot('login')
                ->press('LOGIN')
                ->assertPathIs('/dashboard')
                ->pause(2000)
                ->screenshot('home')
                ->visit('funcionario/create')
                ->pause(2000)
                ->type('nome', 'Zezinho')
                ->type('password', '12345678')
                ->type('password_confirmation', '12345678')
                ->select('departamento_id', 1)
                ->press('cadastrar')
                ->pause(2000)
                ;
        });
    }
}
