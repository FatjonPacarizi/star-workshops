<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workshops')->insert([
            [
                'name' => 'Bootcamps',
                'author' => '1',
                'limited_participants' => null,
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 13:53', // do not put seconds here
                'created_at' => '2022-01-09 12:14:19',
            ], [
                'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 12:14', // do not put seconds here
                'created_at' => '2022-02-09 12:14:19',
            ], [
                'name' => '1 Hour JavaScript',
                'author' => '2',
                'limited_participants' => '30',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-10-09 14:20:19',
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '2',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 12:14', // do not put seconds here
                'created_at' => '2022-02-09 12:14:19',
            ],
            [
                'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'author' => '1',
                'limited_participants' => null,
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 12:14', // do not put seconds here
                'created_at' => '2022-02-09 12:14:19',
            ],
            [
                'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'author' => '1',
                'limited_participants' => null,
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-09-09 12:14', // do not put seconds here
                'created_at' => '2022-03-09 12:14:19',
            ],
            [
                'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 12:14', // do not put seconds here
                'created_at' => '2022-04-09 12:14:19',
            ],
            [
                'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 12:14', // do not put seconds here
                'created_at' => '2022-04-09 12:14:19',
            ],
            [
                'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'author' => '1',
                'limited_participants' => null,
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 12:14', // do not put seconds here
                'created_at' => '2022-04-09 12:14:19',
            ],
            [
                'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 12:14', // do not put seconds here
                'created_at' => '2022-04-09 12:14:19',
            ],
            [
                'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 12:14', // do not put seconds here
                'created_at' => '2022-05-09 12:14:19',
            ],
            [
                'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => null,
                'workshop_endTime' => null,
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-10-09 12:14', // do not put seconds here
                'created_at' => '2022-06-09 12:14:19',
            ], [
                'name' => 'The Complete JavaScript Course 2022: From Zero to Expert!',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-08-09 12:20:19',
                'workshop_endTime' => '2022-08-09 14:14:19',
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-08-09 12:14', // do not put seconds here
                'created_at' => '2022-06-09 12:14:19',

            ], [
                'name' => 'Build Responsive Real-World Websites with HTML and CSS',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-08-09 12:20:19',
                'workshop_endTime' => '2022-08-09 12:14:19',
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-08-09 12:14', // do not put seconds here
                'created_at' => '2022-07-09 12:14:19',

            ], [
                'name' => 'Modern React with Redux',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-08-09 12:20:19',
                'workshop_endTime' => '2022-08-09 12:14:19',
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-08-09 12:14', // do not put seconds here
                'created_at' => '2022-07-09 12:14:19',

            ], [
                'name' => 'Python and Django Full Stack Web Developer Bootcamp',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-08-09 12:20:19',
                'workshop_endTime' => '2022-08-09 12:14:19',
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-08-09 12:14', // do not put seconds here
                'created_at' => '2022-08-09 12:14:19',
            ], [
                'name' => 'HTML and CSS for Beginners - Build a Website & Launch ONLINE',
                'author' => '2',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-08-09 12:20:19',
                'workshop_endTime' => '2022-08-09 12:14:19',
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-08-09 12:14', // do not put seconds here
                'created_at' => '2022-08-09 12:14:19',
            ], [
                'name' => 'The Complete ASP.NET MVC 5 Course',
                'author' => '2',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-08-09 12:20:19',
                'workshop_endTime' => '2022-08-09 12:14:19',
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-08-09 12:14', // do not put seconds here
                'created_at' => '2022-08-09 12:14:19',
            ],
            [
                'name' => 'The Complete JavaScript Course 2022: From Zero to Expert!',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-08-09 12:20:19',
                'workshop_endTime' => '2022-08-09 12:14:19',
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-08-09 12:14', // do not put seconds here
                'created_at' => '2022-09-09 12:14:19',
            ],
            [
                'name' => 'The Complete JavaScript Course 2022: From Zero to Expert!',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-08-09 12:20:19',
                'workshop_endTime' => '2022-08-09 12:14:19',
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-08-09 12:14', // do not put seconds here
                'created_at' => '2022-09-09 12:14:19',
            ],
            [
                'name' => 'The Complete JavaScript Course 2022: From Zero to Expert!',
                'author' => '1',
                'limited_participants' => '20',
                'description' => '<h1 style="font-size:25px;"><b>Background</b></h1> </br>
               
                Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security
                WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply. The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world. Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                Pristina, KOSOVO.
                <br></br>
                <strong>Objectives</strong> 
                
                <br></br>
                
                <li> The key objectives of the side event were: </br> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To discuss the context of regulatory practices and oversight for the security of radioactive sources,
                To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,
                To identify best practices and discuss them with a broader audience,
                To improve diversity and inclusion in nuclear security.</li>
<br></br>
               <strong> Audience</strong>
               <br></br>
                
                The target audience was:
                
                Nuclear regulatory bodies,
                Licensees,
                Academia,
                International organizations,
                Government officials.
                
                Process
                
                The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event. The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.
                Event time: 22 June 2022, 12:45-13:45 CEST
                Event location: International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building
                WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.',
                'workshop_startTime' => '2022-08-09 12:20:19',
                'workshop_endTime' => '2022-08-09 12:14:19',
                'type_id' => '1',
                'country_id' => '1',
                'city_id' => '1',
                'category_id' => '1',
                'filedlink' => 'Workshop',
                'time' => '2022-08-09 12:14', // do not put seconds here
                'created_at' => '2022-09-09 12:14:19',
            ],
            
        ]);
    }
}
