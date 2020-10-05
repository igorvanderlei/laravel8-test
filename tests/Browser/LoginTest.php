<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Funcionario;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    /*
    public function testLogin()
    {
        $funcionario = Funcionario::find(random_int(1,50));

        $this->browse(function ($browser) use ($funcionario) {
                $browser->visit('/login')
                ->type('nome', $funcionario->nome)
                ->type('password', 'password')
                ->pause(2000)
                ->screenshot('login')
                ->press('LOGIN')
                ->assertPathIs('/dashboard')
                ->pause(2000)
                ->screenshot('home')
            ;
        });
    }*/
}
