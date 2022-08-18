@extends('layouts.landinglayouts')

@section('content')
    <section class = "relative ">
        <img class = "inline-block w-full h-80 " src="{{ asset('img/meet-the-team.jpg') }} "/>
        <svg class="swirl absolute -bottom-1 w-full h-6 md:h-20 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3091 338" preserveAspectRatio="none">
            <path fill-rule="evenodd"  fill="rgb(185, 28, 28)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
            <path fill="url(#PSgrad_0)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
        </svg>
    </section>
    <section class="w-full pb-20 mb-8 flex justify-center  bg-red-700  ">
        <div class="w-full md:w-5/6 ">
            <div class="pl-10">
                <h1 class=" text-xl mb-2  text-gray-600 ">Who are we</h1>
                <h1 class="text-4xl text-white font-bold ">Meet the Team</h1>
            </div>
            <div class="w-full mx-auto flex flex-wrap  sm:w-full ">


                <div class="flex">

                            <span class="inline-flex items-center justify-center h-6 w-6 text-red-500"><i class="mdi mdi-speedometer text-red-500 inline-flex"></i></span>
                            <h1 class = "my-5 w-full md:w-3/4 ml-4 text-white" >Our work is overseen by a board of directors that is chaired by William H. Tobey.
                                Our staff consist of a small, dedicated team of international professionals who support WorkShops’ mission and vision and who work tirelessly to achieve WINS’ goals.
                                To learn more about our board and staff, simply scroll down the page. You may also read the statement of assurance from our Board.
                            </h1>
                        </div>
                    </div>

            </div>
        </div>
    </section>
    <section class=" w-full py-10 flex flex-col items-center ">

        <h1 class = "w-full p-20 text-center text-4xl roundedTop -mt-40 bg-white">StarWorkshops Members</h1>
 
       @foreach ($staffMembers as $staffMember)
    

         <div class=" my-10 w-9/12  flex flex-wrap">

                <img class=" w-7/8 lg:w-1/2 "  src="{{ asset('storage/'.$staffMember->profile_photo_path)}}" alt=" "  />

                <div class="w-full mt-5  flex flex-col justify-center  lg:pl-20 lg:w-1/2">
                    <h5 class="mb-6 text-[#00517E] text-4xl font-bold tracking-tight dark:text-white">{{$staffMember->name}}</h5>
                    <p class="text-gray-700  dark:text-gray-400">{{$staffMember->description}}</p>
                </div>


        </div>
        
        @endforeach
    </section>
@endsection
