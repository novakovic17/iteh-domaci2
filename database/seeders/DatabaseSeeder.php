<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(Vrste::class);
        $this->call(Klijenti::class);
        $this->call(Termini::class);
        $this->call(Users::class);
    }
}
