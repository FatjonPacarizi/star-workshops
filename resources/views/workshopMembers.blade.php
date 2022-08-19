@extends('layouts.landinglayouts')

@section('content')
    <section class = "relative ">
        <img class = "inline-block w-full h-80 " src="{{ asset('img/meet-the-team.jpg') }} "/>
        <svg class="swirl absolute -bottom-1 w-full h-6 md:h-20 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3091 338" preserveAspectRatio="none">
            <path fill-rule="evenodd"  fill="rgb(185, 28, 28)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
            <path fill="url(#PSgrad_0)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
        </svg>
    </section>
    <section class="w-full pb-20 flex justify-center  bg-red-700  ">
        <div class="w-full md:w-5/6 ">
            <div class="pl-10">
                <h1 class=" text-xl mb-2  text-white ">Who are we</h1>
                <h1 class="text-4xl text-white font-bold ">Meet the Team</h1>
            </div>
            <div class="w-full mx-auto flex flex-wrap sm:w-full ">


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



    <section class="flex flex-wrap justify-center relative">
    <h1 class = "p-20 text-center text-6xl mt-10 font-bold bg-red-700 text-white w-11/12 md:11/12">StarWorkshops Members</h1>
         <div class="flex flex-wrap lg:mx-4 pt-16 pb-16 justify-center w-4/5" >

       @foreach ($staffMembers as $staffMember)

            <div class="w-full justify-center items-center rounded-lg md:w-1/3 p-8">
                <div class="bg-white drop-shadow-xl flex flex-col">
                    <img class="w-full object-cover rounded-tl-lg rounded-tr-lg p-5"  src="{{ asset('img/shef.png')}}" alt="" />
                    <h5 class="px-5 py-1 text-center text-2xl font-extrabold">{{$staffMember->name}}</h5>
                    <p class="px-5 py-1 text-center text-sm font-semibold">{{$staffMember->description}}</p>
                        <div class="flex justify-center h-10 mt-5 ">
                            <a href="#"><i class="fa-brands fa-instagram fa-2xl" style="color:red"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube fa-2xl mx-4" style="color:red"></i></a>
                            <a href="#"><i class="fa-brands fa-github fa-2xl" style="color:red"></i></a>
                        </div>
                </div>
            </div>
            

        @endforeach
    </div>
    </section>

@endsection