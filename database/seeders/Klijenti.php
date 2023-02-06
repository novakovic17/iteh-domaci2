<?php

namespace Database\Seeders;

use App\Models\Klijent;
use Illuminate\Database\Seeder;

class Klijenti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 15; $i++){
            Klijent::create([
                'ime' => $faker->firstname(),
                'prezime' => $faker->lastname()
            ]);
        }

    }
}
