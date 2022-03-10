<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enquete;

class EnquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enquete::create([
            'title' => 'Qual foi a sua opinião sobre esse sistema?',
            'begin' => '2022-03-09',
            'end'   => '2022-06-09',
        ]);
        Enquete::create([
            'title' => 'Essa enquete ainda não pode ser aberta',
            'begin' => '2022-05-09',
            'end'   => '2022-06-09',
        ]);
        Enquete::create([
            'title' => 'Essa enquete já foi finalizada',
            'begin' => '2022-01-09',
            'end'   => '2022-02-09',
        ]);
    }
}
