<?php

namespace Database\Seeders;

use App\Models\Landing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LandingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landings')->insert([
            [
                'section_id' => 'section1',
                'heading' => 'A STAR WORKSHOPS SPECIAL MESSAGE',
                'paragraf_1' =>'<p><span style="font-size: 18px;">Star Workshops condemns any military attacks on Ukraine&rsquo;s nuclear infrastructure and expresses its support for those working hard to protect and secure these sites.</span></p>',
                'paragraf_2' => null,
                'button' =>'/about',
            ],

            [
                'section_id' => 'section2',
                'heading' => 'About Star Workshops',
                'paragraf_1' =>'<p><span style="font-size: 18px;">Our primary purpose is to improve the professionalism and competence of all those involved in nuclear security so that nuclear and other radioactive materials are not used for terrorist or other criminal purposes. This requires confidence that the management and regulatory systems that support nuclear security are effective against the postulated threats including physical, cyber and insiders, as well as combinations thereof. We support this objective by sharing best security practices and advocating for the professional certification of all personnel with responsibilities for nuclear security.</span></p>',
                'paragraf_2'=>'5974 members worldwide in 150 Countries',
                'button' =>null,
            ],

            [
                'section_id' => 'section3',
                'heading' => 'Workshops and Training',
                'paragraf_1' =>'<p>Our professionally facilitated workshops and training courses provide excellent learning and peer-to-peer networking opportunities with a cross-section of the nuclear industry—from licensees and regulators to security experts, academics, law enforcement and vendors.</p>',
                'paragraf_2' => null,
                'button' =>'/workshops',
            ],

            [
                'section_id' => 'section4',
                'heading' => 'Star Workshops Academy',
                'paragraf_1' =>'<p>The Star Workshops Academy is the world’s first certified professional development programme for individuals with responsibilities in nuclear or radioactive source security management.</p>',
                'paragraf_2' => null,
                'button' =>'/members',
            ],

            [
                'section_id' => 'section5',
                'heading' => 'Evaluation',
                'paragraf_1' =>'<p>Star Workshops evaluation services help licensees assess the maturity of their security programme, measure the effectiveness of their security culture, and identify areas that are strong as well as those that could be improved.</p>',
                'paragraf_2' => null,
                'button' =>'/workshops',
            ],

            [
                'section_id' => 'section6',
                'heading' => 'MEMBER STORIES',
                'paragraf_1' =>'<p>I firmly believe the Star Workshops certification programmes will help change perceptions, towards nuclear security and will lead to greater security globally as more and more people enroll and build competence in their areas of responsibility.</p>',
                'paragraf_2' =>'<p>Ramadan Gashi, Web developer</p>',
                'button' =>null,
            ],

            [
                'section_id' => 'section7',
                'heading' => 'Popular Courses',
                'paragraf_1' =>'<p>Star Workshops Academy courses focus on the practitioner and provide best practice guidance that is hands-on, cross-functional and immediately useful. To read more click the button below:</p>',
                'paragraf_2' => null,
                'button' =>'/workshops',
            ],

            [
                'section_id' => 'section8',
                'heading' => 'Star Workshop Company',
                'paragraf_1' =>'<p>We partner up with our clients by setting up, managing and operating their extended teams across Software Development, Quality Assurance, Customer Support, Technical Support and Business process outsourcing services. We make sure that our teams remain satisfied and therefore dedicated to our client’s needs. This makes us reliable, effective and productive. We offer a stress-free workplace, with recreative environments and competitive working conditions with the biggest tech Companies in Kosovo.</p>',
                'paragraf_2' => null,
                'button' =>'https://www.starlabs.dev/whyus/',
            ],
        ]);
    }
}