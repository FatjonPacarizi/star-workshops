@extends('layouts.landinglayouts')
@section('content')

<section class="text-black body-font flex flex-col items-center">
  <div class="w-4/5 flex flex-wrap">
    <div class="w-full  lg:w-3/4  lg:pr-10 ">
    <img class="bg-slate-100 rounded-xl p-8 dark:bg-slate-800 w-14" 
                src="{{$staffMembers->profile_photo_path ? asset('/storage/' . $staffMembers->profile_photo_path) : asset('img/defaultuserphoto.png') }}"
                alt="" />
        <div class="text-left lg:w-5/3 w-full">
          <h1 class="title-font sm:text-4xl text-4xl mb-4 font-medium text-black"><b>{{ $staffMembers->title }}</b></h1>
          <p class="mb-8 py-5 text-xl text-gray-700">{!! $staffMembers->description !!}</p>
        </div>
        <div class="flex h-10 mt-5 ">
                <a href="{{$staffMembers->instagram}}" target="_blank"><i class="fa-brands fa-instagram fa-2xl"
                        style="color:red"></i></a>
                <a href="{{$staffMembers->facebook}}" target="_blank"><i class="fa-brands fa-facebook fa-2xl mx-4"
                        style="color:red"></i></a>
                <a href="{{$staffMembers->github}}" target="_blank"><i class="fa-brands fa-github fa-2xl"
                        style="color:red"></i></a>
            </div>
    </div>
    
 
</div>
  <a href="/members" class="tracking-widest text-xl title-font font-medium text-gray-500 mb-4">Show more </a>
</section>
@endsection