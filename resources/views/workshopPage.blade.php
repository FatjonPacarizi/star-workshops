@extends('layouts.landinglayouts')

@section('content')
    <section class="text-white body-font bg-red-700 clippath ">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col  " >
            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left ">
                <div class="flex ">
                    <a href="{{route('workshops')}}" class="inline-flex border-0 text-black rounded text-sm hover:text-white"> < BACK TO EVENTS</a>
                </div>
                <h1 class="title-font sm:text-4xl mb-4 font-medium text-white text-5xl ">
                    {{$workshop->name}}
                </h1>
                <p class="mb-8 leading-relaxed"> {{$workshop->time}} </p>
                <p class="mb-8 leading-relaxed"> {{$workshop->country}} </p>

                <p class="mb-8 leading-relaxed">Applications for this event are closed</p>
            </div>

            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                
                <img class="object-cover rounded" alt="hero" src="{{$workshop->img_workshop ? asset('/storage/' . $workshop->img_workshop) : asset('/img/test.jpg')}}">
            </div> </div>
    </section>


    <section class="text-white body-font bg-white">
        <div class="container mx-auto px-5 py-24  ">
            <div class="lg:flex-grow lg:pl-24 md:pl-16 md:items-start md:text-left ">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white text-red-600">Background</h1>
                <p class="mb-8 leading-relaxed text-xl text-red-900">Launch of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security</p>
                <p class="mb-8 leading-relaxed text-black">WINS published in June 2022 a new WINS International Best Practice Guide Regulatory Practices for Radioactive Source Security. The objective of this guide is to consolidate the experience and insights gathered by WINS in different activities and work material, providing considerations for best practices in the development and establishment of regulatory practices, different approaches and perspectives with respect to the regulatory practices, the role of threat assessment and risk reduction in informing and shaping such practices, and the coordination mechanisms that all these activities imply.
                    The IAEA organised an International Conference on Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours from 20–24 June 2022 in Vienna. The purpose of the conference was to foster the exchange of experiences and anticipated future developments related to establishing and maintaining a high level of safety and security of radioactive sources throughout their life cycle.  This international conference gathered a large number of radioactive source security professionals from around the world.
                    Therefore, WINS decided to organise a side-event on the margins of this event to promote its new publication.
                    Pristina, KOSOVO </p>
            </div>

            <div class="lg:flex-grow lg:pl-24 md:pl-16 md:text-left">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white text-red-600">Objectives</h1>
                <p class="mb-8 leading-relaxed text-xl text-black">The key objectives of the side event were:</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> To promote the new WINS Best Practice Guide on Regulatory Practices for Radioactive Source Security,</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> To discuss the context of regulatory practices and oversight for the security of radioactive sources,</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> To highlight the key messages of the Best Practice Guide on Regulatory Practices for Radioactive Source Security,</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> To identify best practices and discuss them with a broader audience,</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> To improve diversity and inclusion in nuclear security.</p>
            </div>


            <div class="lg:flex-grow lg:pl-24 md:pl-16 md:text-left">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white text-red-600">Audience</h1>
                <p class="mb-8 leading-relaxed text-xl text-white">The target audience was:</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> Nuclear regulatory bodies,</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> Licensees,</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> Academia,</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> International organizations,</p>
                <p class="mb-8 leading-relaxed text-black"><span class="text-red-600">-</span> Government officials.</p>
            </div>

            <div class="lg:flex-grow lg:pl-24 md:pl-16 md:text-left">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white text-red-600">Process</h1>
                <p class="mb-8 leading-relaxed  text-black">The one hour, in-person event was facilitated by Mr. Tomas Bieda, WINS, and included presentations and discussions. The lead author for the Guide, a representative from a competent authority and a representative from a licensee were invited to contribute to the discussion. Hard copies of the WINS International Best Practice Guide on Regulatory Practices for Radioactive Source Security were made available during the event.</p>
                <p class="mb-8 leading-relaxed text-black"> The event was conducted as a side event on the margins of the IAEA International Conference on the Safety and Security of Radioactive Sources – Accomplishments and Future Endeavours (20–24 June 2022). To attend this side event, the participants needed to be registered for the conference since the access to the premises is limited.</p>
                <p class="mb-8 leading-relaxed text-black"> <b>Event time:</b> 22 June 2022, 12:45-13:45 CEST</p>
                <p class="mb-8 leading-relaxed text-black"> <b>Event location:</b> International Atomic Energy Agency, Vienna International Centre, Wagramer Strasse 5, 1220 Vienna, Austria, Room M5, M-building</p>
                <p class="mb-8 leading-relaxed text-black"> WINS is promoting gender parity in its events and female delegates were strongly encouraged to participate.</p>
            </div></div>
    </section>
@endsection
