<?php

namespace Database\Factories;

use App\Models\Mensagem;
use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\Factory;

class MensagemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mensagem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
        	'texto' => $this->faker->text(200),
        ];
    }

    public function remetente($id) {
        return $this->state([
                'funcionario_id' => $id
            ]);
    }

    public function destinatario($id) {
       return $this->state([
                'destinatario_id' => $id
            ]);
    }
}
