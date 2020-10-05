<?php

namespace Database\Factories;

use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Funcionario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'nome' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => $this->faker->lexify('??????????'),
        ];
    }

    public function randomDepto($min, $max) {
        return $this->state([
            'departamento_id' => $this->faker->numberBetween($min,$max)
        ]);
    }
}
