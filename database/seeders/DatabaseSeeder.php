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
use App\Models\Landing;
use App\Models\NewsPage;
use App\Models\Streaming;
use App\Models\Workshop_Page;
use App\Models\Comment;
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
            CountrySeeder::class,
            CitySeeder::class,
            FaqSeeder::class,
            FeedbackSeeder::class,
            TypeSeeder::class,
            InformationsSeeder::class,
            AboutsSeeder::class,
            UsersSeeder::class,
            WorkshopSeeder::class,
            PositionsSeeder::class,
            Positions_Users_Seeder::class,
            LandingsSeeder::class,
            WorkshopsUsersSeeder::class, 
            NewsPageSeeder::class,
            MessageSeeder::class,
            StreamingSeeder::class,
            WorkshopPageSeeder::class,
            CommentSeeder::class
        ]);

    }
}
