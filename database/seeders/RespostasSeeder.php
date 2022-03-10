<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resposta;

class RespostasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resposta::create([
            'text'          => 'Estou super satisfeito',
            'enquete_id'    => '1',
        ]);

        Resposta::create([
            'text'          => 'Deu pro gasto',
            'enquete_id'    => '1',
        ]);

        Resposta::create([
            'text'          => 'Fiquei decepcionado',
            'enquete_id'    => '1',
        ]);

        Resposta::create([
            'text'          => 'Demorou muito tempo',
            'enquete_id'    => '1',
        ]);

        Resposta::create([
            'text'          => 'Não cumpriou com o que foi pedido',
            'enquete_id'    => '1',
        ]);

        Resposta::create([
            'text'          => 'Resposta 1 da enquete não iniciada',
            'enquete_id'    => '2',
        ]);

        Resposta::create([
            'text'          => 'Resposta 2 da enquete não iniciada',
            'enquete_id'    => '2',
        ]);

        Resposta::create([
            'text'          => 'Resposta 3 da enquete não iniciada',
            'enquete_id'    => '2',
        ]);

        Resposta::create([
            'text'          => 'Resposta 1 da enquete finalizada',
            'enquete_id'    => '3',
        ]);

        Resposta::create([
            'text'          => 'Resposta 2 da enquete finalizada',
            'enquete_id'    => '3',
        ]);

        Resposta::create([
            'text'          => 'Resposta 3 da enquete finalizada',
            'enquete_id'    => '3',
        ]);
    }
}
