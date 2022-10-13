@extends('layouts.landinglayouts')
@section('content')

<section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
    <div class="flex flex-wrap lg:mx-4 pt-16 pb-16 justify-center w-4/5">
        <div class="flex flex-col items-center mt-16">
            <h1 class="text-6xl font-bold text-red-500">Meet the Team</h1>
            <h1 class="my-5 w-full md:w-3/4 ml-4 lg:w-1/2 text-xl text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </h1>
        </div>
        @foreach ($staffMembers as $staffMember)
        <div class="w-full h-fit md:w-2/5 lg:w-1/4 p-6 bg-white md:ml-16 rounded-3xl mt-10">
            <img class="w-full object-cover rounded-tl-lg rounded-tr-lg p-5" src="{{$staffMember->profile_photo_path ? asset('/storage/' . $staffMember->profile_photo_path) : asset('img/defaultuserphoto.png') }}" alt="" />
            <h5 class="py-1 text-3xl font-extrabold my-4 text-red-700">{{$staffMember->name}}</h5>
            <p id={{$staffMember->id}} class="py-1 font-semibold leading-6 text-base text-gray-600 ">
                {{\Illuminate\Support\Str::limit($staffMember->description, 150, $end='') }} <a href="{{route('single-member',$staffMember->id)}}" onClick="expandCard({{route('single-member',$staffMember->id)}}')" class="text-blue-400"></button>
            </p>
            <a class="text-red-600 inline-flex items-center my-1 md:mb-2 lg:mb-1" href="{{route('single-member',$staffMember->id)}}">Read More
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <div class="flex h-10 mt-5 ">
                <a href="{{$staffMember->instagram}}" target="_blank"><i class="fa-brands fa-instagram fa-2xl" style="color:red"></i></a>
                <a href="{{$staffMember->facebook}}" target="_blank"><i class="fa-brands fa-facebook fa-2xl mx-4" style="color:red"></i></a>
                <a href="{{$staffMember->github}}" target="_blank"><i class="fa-brands fa-github fa-2xl" style="color:red"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection