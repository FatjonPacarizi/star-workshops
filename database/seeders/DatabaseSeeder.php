<?php

namespace Database\Seeders;

use Informations;
use App\Models\Faq;
use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Workshop;
use Illuminate\Database\Seeder;
use Database\Seeders\InformationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            CitySeeder::class,
            CountrySeeder::class,
            FaqSeeder::class,
            FeedbackSeeder::class,
            TypeSeeder::class,
            WorkshopSeeder::class,
            InformationsSeeder::class,
            AboutsSeeder::class,
            PositionsSeeder::class,
            Positions_Users_Seeder::class
        ]);

    }
}
