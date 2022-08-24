@extends('layouts.landinglayouts')

@section('content')


    <section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
         <div class="flex flex-wrap lg:mx-4 pt-16 pb-16 justify-center w-4/5" >
         <div class="flex flex-col items-center mt-16">
            <h1 class="text-6xl font-bold text-red-500">Meet the Team</h1>
            <h1 class = "my-5 w-full md:w-3/4 ml-4 lg:w-1/2 text-xl" >Our work is overseen by a board of directors that is chaired by William H. Tobey.
                Our staff consist of a small, dedicated team of international professionals who support WorkShops’ mission and vision and who work tirelessly to achieve WINS’ goals.
        </h1>
        </div>
       @foreach ($staffMembers as $staffMember)
            <div class="w-full md:w-2/5 lg:w-1/4 p-6 bg-white md:ml-16 rounded-3xl mt-10">
                    <img class="w-full object-cover rounded-3xl"  src="{{ asset('img/shef.png')}}" alt="" />
                    <h5 class="py-1 text-3xl font-extrabold my-4 text-red-700">{{$staffMember->name}}</h5>
                    <p class="py-1 font-semibold leading-6 text-base text-gray-600 ">{{$staffMember->description}}</p>
                        <div class="flex h-10 mt-5 ">
                            <a href="#"><i class="fa-brands fa-instagram fa-2xl" style="color:red"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube fa-2xl mx-4" style="color:red"></i></a>
                            <a href="#"><i class="fa-brands fa-github fa-2xl" style="color:red"></i></a>
                        </div>
                </div>
        @endforeach
    </div>
    </section>

@endsection