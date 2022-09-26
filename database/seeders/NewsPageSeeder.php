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
        DB::table('news_pages')->insert([[
            'title' => 'STARLABS HOSTED 53 COMPANIES FROM GERMANY',
            'author' => '1',
            'description' => 'A delegation of 53 businesses from Germany, visited Kosovo during April, for a three-day visit.
            StarLabs, was honored to host the companies and organize a one day visit at the Companys premises and also at the Digital School, on April 30th, 2022.<br></br>
            
            This event was organized in cooperation with the German Chamber of Commerce in Kosovo, which chose StarLabs as a success story. Our CEO, Hana Qerimi and Co-Founder Darsej Rizaj, had the opportunity to share our story, and the successful relationships that StarLabs has in particular with clients and companies from the German market. 
            
            The Ambassador of the Republic of Kosovo in Germany, Faruk Ajeti, recently has stated in the media that economic diplomacy remains undoubtedly one of the priorities of the foreign policy of Kosovos Government. 
            <p class="italic "">“Together with the Consul of the Republic of Kosovo in Stuttgart, Besnik Miftaraj, we will accompany them through various meetings and visits”,</p> concluded Ajeti, transmitted to Albinfo.com.
            <br></br>

            StarLabs is currently the second largest employer in the field of Information and Communication Technology  in Kosovo.  Our company was established in 2015 in Prishtina, the Capital City of Kosovo in south-eastern Europe
            <br></br>

            Located in 1700 square meters in the center of Prishtina, we operate with 200 engineering teams. Our biggest advantage is that we have access to the biggest pool of talents through our access in Digital School – The sister company, which is the biggest programming school for youth in the country as well as a franchise in over 50 locations worldwide. ',
            'time' => '2022-09-09 12:14:19',
        ],[
            'title' => 'Kosovo President Vjosa Osmani visited StarLabs and Digital School.',
            'author' => '1',
            'description' => 'World Creativity and Innovation Day was marked with senior state level visits to our companies.<br></br>

            Prishtina, April 21, 2022 – The President of the Republic of Kosovo, Mrs. Vjosa Osmani–Sadriu, chose our companies – StarLabs and Digital School – on The World Creativity and Innovation Day. 
            
            Her visit was welcomed by the co-founders of the two companies, Hana Qerimi and Darsej Rizaj, who informed the President of the country around the history behind the founding of the companies, their growth and development, as well as the extraordinary potential that Kosovo has with its young people in the field of information and computer technology.
            <br></br>
            <p class="italic ""><b>“We’ve only been two people, and now we’re over 200. We had no support or donations. Everything we’ve achieved is thanks to a lot of work, and today I can say that we’re leaders in the region, and beyond,” </p></b>StarLabs CEO Hana Qerimi said, while presenting the President with the staff, the offices of two companies, and the work both companies are doing regarding skills and employment of youth in the field of technology.   ',
            'time' => '2022-09-09 12:14:19',
        ],
        [
            'title' => 'MEET NEHARI AND METRY.V, WHO WILL SPEED UP YOUR WEBSITE!',
            'author' => '1',
            'description' => 'Nehar Jashari returned from Germany, and received funding from StarLabs to launch his company.

            Prishtina, March 2022 – How many times did you have to open a new webpage on your internet browser, and get a single word: “loading”? <br></br>We don’t think there’s anything that makes us angrier when we browse websites than when we waste time on getting information, services, or buying any products on one of the websites that are designed to carry out these tasks for us. The 23-year-old from Prishtina, who works as a programmer at StarLabs, Nehari Jashari has been thinking about a solution to this problem. Fast websites, high performance, efficiency, problem-solving as well as greater business opportunities – this is what he offers with the product he is developing with StarLabs as part of his start-up – Metry.V.',
            'time' => '2022-09-09 12:14:19',
        ],[
            'title' => '36 NEW POSITIONS AVALIABLE!',
            'author' => '1',
            'description' => 'StarLabs has just started working with two new clients, which are present in several European countries. Therefore, our Company needs to increase the number of our team members. We are consequently looking for talents who can join us in 36 available positions at our Company.
            <br></br>
    
            The open positions are as follows:
            <li>
            PHP / WordPress or Symphony Developer (15 positions)
            .NET or .NET CORE Developer (15 positions)
            Python Developer (1 position)
            FrontEnd Developer (ReactJS / VueJS) (2 positions)
            QA Engineer (1 position)
            DevOps (1 position)
            Scrum Master (1 position)</li>
            <br></br>
            StarLabs counts a team with 150 people in total, teams that are constantly expanding with new members. In this way, we are trying to offer professional opportunities and career advancement for young people, talents, and professionals.
            <br></br>
            The responsibilities required of applicants for open positions are:
            <li>
            Commitment to learning the fastest technologies that StarLabs customers require;
            Full-time work;
            Communication skills with clients, in English;
            Pro-activity and willingness to work in a team.</li>
            <br></br>
            What does StarLabs offer?
            <li>
            Mentoring and tips
            Staff support for further vocational training
            Opportunity for career advancement
            Health Insurance
            A professional and friendly environment
            Game Room (Space dedicated to Playstation, Darts, Table Football, Ping Pong)
            Social Clubs (Weekly terms for sports, participation in local tournaments, esports and tournaments)
            Hybrid work (from office and home)
            Training and Workshops on various technologies at StarLabs
            Professional training from StarLabs customers
            Various bonuses, such as sales, recruitment, etc.
            Hackathons and spinoff/investment opportunities from StarLabs
            Work environment without high pressure or micromanagement
            Courses at work, English language</li>',
            'time' => '2022-09-09 12:14:19',
        ],[
            'title' => 'THE INTERNSHIP PROGRAM AT STARLABS, A TECH LAB IN KOSOVO',
            'author' => '1',
            'description' => 'In addition to contributing to the technology market, with the services it provides, StarLabs has opened its doors to young people who want to work in this field, enabling them to prepare for the labor market.

            Prishtina, February 2022 – It’s a normal day of work at StarLabs. And Emini, a 23-year-old from Gjilan, is sitting at his desk. His big headphones are on his shoulders. You never know when he’ll need them.
            <br></br>
            The 23-year-old from Gjilan has been part of the StarLabs team of programmers since 2020. It was the beginning of the COVID-19 pandemic, and the lockdown period, the time when And decided to apply for a program he had heard of online, which StarLabs was offering to students and new graduates of the Faculty of Computer Science and beyond.
            <br></br>
            <p class="italic "">“I saw the application and to be honest it was very accessible,”</p>And says. <p class="italic "">“It was the beginning of the pandemic, and in the application, it stated that we could get into an online internship program. Another thing, that distinguishes this application from others I have seen, is that it was an advantage for us, the newly graduates since it required very little or no experience at all,” </p>explains And enthusiastically.
            He had successfully completed the first phase of the StarLabs internship program, which started in March 2020.
            <br></br>
            The co-founder and the CTO of Starlabs, Darsej Rizaj, explains that the internship program was first born as a need of the company to recruit talents, but also as a contribution that StarLabs has decided to make to the technology community and young people in Kosovo, providing vocational training.
            
            <p class="italic "">“We’ve been building a community, it’s an investment and it’s important to understand that it’s very easy to hire employees, but at some point, we exhaust the market, as was the case. So it’s good to have some sort of Corporate Responsibility and to create resources, and the second thing is that we are building a community for these people, these young talents who want to work in the field of technology,”</p> says Rizaj.',
            'time' => '2022-09-09 12:14:19',
        ],[
            'title' => 'OUR APPROACH TO HELP YOU SUCCEED',
            'author' => '1',
            'description' => 'Many organizations around the world have reduced costs, improved service delivery and enabled innovation and growth by engaging with StarLabs as their strategic outsourcing partner.

            While their reasons vary as much as their businesses, most see outsourcing as a more predictable, scalable, and reliable way to move their business forward.
            <br></br>
            As an outsourcing partner we will assure that you will be able to:
            <li>
            Improve service delivery quality: Take full advantage of standardization, automation, and global integration to deliver consistent, reliable IT services that support business objectives.
            
            Leverage StarLabs`s global industry and technology expertise: Gain access to skills you could not develop in-house or afford to recruit
            
            Become more adaptable and flexible: Scale technology infrastructure up or down to meet changing business needs. Pursue transformation projects that can deliver continual, iterative returns on investment.
            </li>
            <br></br>
            To ensure a successful cooperation with our clients we recommend a number of key activities to be carried out before entering into the outsourcing agreement:
            <li>
            Secure commitment and support from senior management
            Define a strategy including goals and objectives
            Define areas that set the scope and limitations for offshoring – Core (business critical) & Non-Core (non-business critical)
            Define and establish KPI’s both for transition and steady state.</li>',
            'time' => '2022-09-09 12:14:19',
        ],[
            'title' => 'WHY KOSOVO IS AN OUTSOURCING OPPORTUNITY?',
            'author' => '1',
            'description' => 'A strong average of English and German skills, similar work culture to people of Western Europe and the US, huge, untapped and well-educated workforce and experienced training service providers, which deliver certified professionals to the market, make Kosovo a runner-up in the list of the top places for outsourcing in Eastern Europe.
            <br></br>
            Strong and certified expertise in different fields such as the web and mobile application development; Software Testing; Database Development; Web/ Mobile Design; Project Management and more.
            
            Outsourcing to Kosovo is moving towards an interesting development as numerous software development companies are emerging with incredible potential for exporting their services. In addition to that, there are some large, highly profitable companies such as 3CIS, which seems to be already utilizing Kosovo’s youth at a high rate. The other highly recognized outsourcing subset is the BPO. This sector, according to a publishing by LSE’s outsourcing unit, is estimated to steadily rise and overtake the IT in the upcoming years.
            <br></br>
            The BPO sector in CEE countries has already surpassed the ITO sector employment wise. BPO is classified into front office outsourcing and back office outsourcing. Front office outsourcing incorporates mainly operations such as customer-related services and telemarketing; while, back office outsourcing is commonly translated into human resource and financial accounting operations.
            <br></br>
            Some interesting outsourcing companies that are worth mentioning include Outsourcing companies are already in place and are working in this direction, and some important actors to mention include:
            <li>
            3CIS – Telecom Services
            
            Baruti – Front Office
            
            IQ to Link – Back Office
            
            Frakton – Web & App Development
            
            Project Graphics – Design Services
            
            ZAG Apps – Mobile Development
            
            Star Labs – BPO
            </li>
            <br></br>
            They all deliver products and services to the international markets and employee a high number of skilled people, who have the knowledge and experience to compete with similar experts in even more established countries like Ukraine, Romania or Bulgaria in Europe.
            
            The Investment Promotion Agency of Kosovo – IPAK is one of the most important government bodies that support the economic development and investment promotion of the country. Interested folks in the country, can find suitable pieces of information there, such as market reports, investment opportunities, case studies, success stories, etc.
            <br></br><br></br>
            Source:
            <a href="https://www.starlabs.dev/">
            www.starlabs.dev</a>',
            'time' => '2022-09-09 12:14:19',
        ],[
            'title' => 'OUTSOURCING AS A GROWTH STRATEGY',
            'author' => '1',
            'description' => 'StarLabs can become one of the MAIN DRIVERS in your company’s growth.
            <br></br>
            Managers in developed countries are increasingly interested in outsourcing as a potential source of competitiveness and value creation.<br></br>
            
            When first discussing outsourcing at a company strategy session, saving costs is the main topic of conversation. However, if the outsourcing initiative is thoughtfully pursued, cost savings won’t be the main benefit from outsourcing.
            <br></br>
            Many of our customers have found that using StarLabs`s outsourcing capabilities has become a serious strategy for sustained company growth.
            <br></br>
            Outsourcing today is considered as a way to expand even in (and after) recession.It’s cheaper and more efficient than adding staff, buying equipment and paying for new space to do it yourself.
              
            <br></br>
            There are many benefits related to outsourcing IT services or even the entire IT department. However, the main benefit is known to be Cost advantages. The most obvious and visible benefit relates to the cost savings that outsourcing brings about.
            <br></br>
            There is a cost savings of around 60% by outsourcing your work to StarLabs in Kosovo. Plus, the quality of the services provided is high thereby ensuring that low-cost does not mean low-quality.
            <br></br>
            Moreover, the time zone location of StarLabs is a big advantage comparing to many other countries who are known for outsourcing services. Being positioned in South Eastern Europe, the locations time zone eases the logistics over scheduling meetings and training also avoiding excessive costs by running teams on a night shift.
            <br></br>
            When used properly, outsourcing is one of the most effective strategies to business growth on today’s age as it is seen to be the most effective way to reduce expenses, and can even provide a business with a competitive advantage over rivals.
            <br></br>
            In addition to cost savings, companies can employ an outsourcing strategy to better focus on core aspects of the business.',
            'time' => '2022-09-09 12:14:19',
        ],[
            'title' => 'MEET NEHARI AND METRY.V, WHO WILL SPEED UP YOUR WEBSITE!',
            'author' => '1',
            'description' => 'Nehar Jashari returned from Germany, and received funding from StarLabs to launch his company.
            <br></br>
            Prishtina, March 2022 – How many times did you have to open a new webpage on your internet browser, and get a single word: “loading”? We don’t think there’s anything that makes us angrier when we browse websites than when we waste time on getting information, services, or buying any products on one of the websites that are designed to carry out these tasks for us. 
            <br></br>
            The 23-year-old from Prishtina, who works as a programmer at StarLabs, Nehari Jashari has been thinking about a solution to this problem. Fast websites, high performance, efficiency, problem-solving as well as greater business opportunities – this is what he offers with the product he is developing with StarLabs as part of his start-up – Metry.V.',
            'time' => '2022-09-09 12:14:19',
        ],[
            'title' => 'STARLABS HOSTED COMPANIES FROM GERMANY',
            'author' => '1',
            'description' => 'A delegation of 53 businesses from Germany, visited Kosovo during April, for a three-day visit.
            <br></br>
            StarLabs, was honored to host the companies and organize a one day visit at the Companys premises and also at the Digital School, on April 30th, 2022.
            <br></br>
            This event was organized in cooperation with the German Chamber of Commerce in Kosovo, which chose StarLabs as a success story. Our CEO, Hana Qerimi and Co-Founder Darsej Rizaj, had the opportunity to share our story, and the successful relationships that StarLabs has in particular with clients and companies from the German market. 
            <br></br>
            The Ambassador of the Republic of Kosovo in Germany, Faruk Ajeti, recently has stated in the media that economic diplomacy remains undoubtedly one of the priorities of the foreign policy of Kosovos Government.   “Together with the Consul of the Republic of Kosovo in Stuttgart, Besnik Miftaraj, we will accompany them through various meetings and visits”, concluded Ajeti, transmitted to Albinfo.com.
            <br></br>
            StarLabs is currently the second largest employer in the field of Information and Communication Technology  in Kosovo.  Our company was established in 2015 in Prishtina, the Capital City of Kosovo in south-eastern Europe
            <br></br>
            Located in 1700 square meters in the center of Prishtina, we operate with 200 engineering teams. Our biggest advantage is that we have access to the biggest pool of talents through our access in Digital School – The sister company, which is the biggest programming school for youth in the country as well as a franchise in over 50 locations worldwide. ',
            'time' => '2022-09-09 12:14:19',
        ],
    ]);
       
    }
}