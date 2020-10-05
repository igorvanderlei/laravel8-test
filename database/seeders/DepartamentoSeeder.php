<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{

    public function run()
    {
        Departamento::factory()->create(['nome' => 'RH']);
        Departamento::factory()->count(5)->create();
    }
}
