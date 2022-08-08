<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\About::factory(1)->create();
    }
}
