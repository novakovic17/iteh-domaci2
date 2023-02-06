<?php

namespace Database\Seeders;

use App\Models\Vrsta;
use Illuminate\Database\Seeder;

class Vrste extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vrsta::create([
            'vrsta' => 'Mezoterapija',
            'cena' => '2000'
        ]);

        Vrsta::create([
            'vrsta' => 'Manikir',
            'cena' => '1600'
        ]);

        Vrsta::create([
            'vrsta' => 'Pedikir',
            'cena' => '1500'
        ]);

        Vrsta::create([
            'vrsta' => 'Higijenski tretman',
            'cena' => '3000'
        ]);

        Vrsta::create([
            'vrsta' => 'Hemijski piling',
            'cena' => '3500'
        ]);

        Vrsta::create([
            'vrsta' => 'Maderoterapija',
            'cena' => '2000'
        ]);

        Vrsta::create([
            'vrsta' => 'Radiotalasni lifting',
            'cena' => '2000'
        ]);


    }
}
