@extends('layouts.landinglayouts')
@section('content')
<section class="w-full h-screen text-white body-font">
  <div class=" w-full flex flex-wrap  py-24 justify-between items-center ">
    <div class=" md:w-1/2 lg:px-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center text-black ">
      <h1 class="title-font sm:text-4xl text-3xl m-2 mb-4 font-medium ">{{ $staffMembers->name }}
      </h1>
      <p class="mb-8 m-2 leading-relaxed">{!! $staffMembers->email !!}</p>
      <p class="mb-8 text-justify m-2 leading-relaxed">{!! $staffMembers->description !!}</p>
      <div class="flex justify-center">
        <div class="flex h-10 mt-5 m-2">
          <a class="" href="{{$staffMembers->instagram}}" target="_blank"><i class="fa-brands fa-instagram fa-2xl" style="color:red"></i></a>
          <a href="{{$staffMembers->facebook}}" target="_blank"><i class="fa-brands fa-facebook fa-2xl mx-4" style="color:red"></i></a>
          <a href="{{$staffMembers->github}}" target="_blank"><i class="fa-brands fa-github fa-2xl" style="color:red"></i></a>
        </div>
      </div>
    </div>
    <div class="w-2/4 md:w-1/2 border relative  mt-10 md:mt-0 py-10  rounded-l-3xl bg-gray-200 md:pl-16 flex text-center">
      <div class="absolute w-2/4 rounded-l-3xl h-full right-0 top-0  bg-red-600 "></div>
      <img class="w-2/4 object-cover object-center  rounded-l-3xl z-10" alt="Workshops and Training" src="{{$staffMembers->profile_photo_path ? asset('/storage/' . $staffMembers->profile_photo_path) : asset('img/defaultuserphoto.png') }}">
    </div>
  </div>

</section>


@endsection