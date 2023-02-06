<?php

namespace Database\Seeders;

use App\Models\Termin;
use Illuminate\Database\Seeder;

class Termini extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++){
            Termin::create([
                'klijentID' => $faker->numberBetween(1,15),
                'vrstaID' => $faker->numberBetween(1,7),
                'datum' => $faker->dateTimeBetween('now', '5 months')->format('d-m-Y'),
            ]);
        }
    }
}
