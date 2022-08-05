<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InformationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Informations::factory(1)->create();
    }
}
