<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feedback;
use App\Models\User;
use App\Models\NewsPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_pages')->insert([
            'title' => 'STARLABS HOSTED 53 COMPANIES FROM GERMANY',
            'author' => 'Admin',
            'description' => 'A delegation of 53 businesses from Germany, visited Kosovo during April, for a three-day visit.

            StarLabs, was honored to host the companies and organize a one day visit at the Companys premises and also at the Digital School, on April 30th, 2022.
            
            This event was organized in cooperation with the German Chamber of Commerce in Kosovo, which chose StarLabs as a success story. Our CEO, Hana Qerimi and Co-Founder Darsej Rizaj, had the opportunity to share our story, and the successful relationships that StarLabs has in particular with clients and companies from the German market. 
            
            The Ambassador of the Republic of Kosovo in Germany, Faruk Ajeti, recently has stated in the media that economic diplomacy remains undoubtedly one of the priorities of the foreign policy of Kosovos Government.   “Together with the Consul of the Republic of Kosovo in Stuttgart, Besnik Miftaraj, we will accompany them through various meetings and visits”, concluded Ajeti, transmitted to Albinfo.com.
            
            StarLabs is currently the second largest employer in the field of Information and Communication Technology  in Kosovo.  Our company was established in 2015 in Prishtina, the Capital City of Kosovo in south-eastern Europe
            
            Located in 1700 square meters in the center of Prishtina, we operate with 200 engineering teams. Our biggest advantage is that we have access to the biggest pool of talents through our access in Digital School – The sister company, which is the biggest programming school for youth in the country as well as a franchise in over 50 locations worldwide. ',
            'image' => '1660734883.png',
        ]);
        DB::table('news_pages')->insert([
            'title' => 'Kosovo President Vjosa Osmani visited StarLabs and Digital School.',
            'author' => 'Admin 1',
            'description' => 'World Creativity and Innovation Day was marked with senior state level visits to our companies.

            Prishtina, April 21, 2022 – The President of the Republic of Kosovo, Mrs. Vjosa Osmani–Sadriu, chose our companies – StarLabs and Digital School – on The World Creativity and Innovation Day. 
            
            Her visit was welcomed by the co-founders of the two companies, Hana Qerimi and Darsej Rizaj, who informed the President of the country around the history behind the founding of the companies, their growth and development, as well as the extraordinary potential that Kosovo has with its young people in the field of information and computer technology.
            
            “We’ve only been two people, and now we’re over 200. We had no support or donations. Everything we’ve achieved is thanks to a lot of work, and today I can say that we’re leaders in the region, and beyond,” StarLabs CEO Hana Qerimi said, while presenting the President with the staff, the offices of two companies, and the work both companies are doing regarding skills and employment of youth in the field of technology.   ',
            'image' => '1660734883.png',
        ]);
        DB::table('news_pages')->insert([
            'title' => 'MEET NEHARI AND METRY.V, WHO WILL SPEED UP YOUR WEBSITE!',
            'author' => 'Admin 2',
            'description' => 'Nehar Jashari returned from Germany, and received funding from StarLabs to launch his company.

            Prishtina, March 2022 – How many times did you have to open a new webpage on your internet browser, and get a single word: “loading”? We don’t think there’s anything that makes us angrier when we browse websites than when we waste time on getting information, services, or buying any products on one of the websites that are designed to carry out these tasks for us. The 23-year-old from Prishtina, who works as a programmer at StarLabs, Nehari Jashari has been thinking about a solution to this problem. Fast websites, high performance, efficiency, problem-solving as well as greater business opportunities – this is what he offers with the product he is developing with StarLabs as part of his start-up – Metry.V.',
            'image' => '1660734883.png',
        ]);
    }
}
