<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionario;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::factory()->create(['nome' => 'igor', 'departamento_id' => 1]);
        for($i=0; $i < 50; $i++)
            Funcionario::factory()->randomDepto(1,6)->create();
    }
}
