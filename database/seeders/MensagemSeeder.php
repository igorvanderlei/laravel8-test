<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mensagem;

class MensagemSeeder extends Seeder
{

    public function run()
    {
        for($i=1; $i < 100; $i++) {
             $id1 = random_int(1,10);
             do {
            	$id2 = random_int(1,10);
             } while ($id1 == $id2);

            Mensagem::factory()->remetente($id1)->destinatario($id2)->create();
        }
    }
}
