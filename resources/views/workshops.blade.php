@extends('layouts.landinglayouts')

@section('content')
<section class = "relative">
  <img class = "inline-block w-full h-80 " src="{{ asset('img/banner.jpg') }} "/>
  <svg class="swirl absolute -bottom-1 w-full h-20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3091 338" preserveAspectRatio="none">
    <path fill-rule="evenodd"  fill="rgb(229,231,235)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
    <path fill="url(#PSgrad_0)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
    </svg>
</section>
<section class="w-full pb-20 mb-8 flex justify-center  bg-gray-200  ">
  <div class="w-5/6 ">
    <div class="pl-10">
    <h1 class="mb-2 font-bold">EVENTS</h1>
    <h1 class="text-2xl ">UPCOMING EVENTS</h1>
  </div>
    <div class="w-full flex flex-wrap">
      @foreach($upcomings as $upcoming)
        <div class="w-1/4 rounded shadow-lg m-10 bg-white">
          <img class = "rounded" src="{{ asset('img/test.jpg') }} "/>
          <div class="flex">

            <span class="inline-flex items-center justify-center h-6 w-6 text-red-500"><i class="mdi mdi-speedometer text-red-500 inline-flex"></i></span>
            <h1 class  = "my-5">21-NOV2021  21-NOV-2022</h1>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<section class="w-full pt-6 flex flex-col items-center  bg-white">

    <h1 class = "w-full p-20 text-center text-4xl roundedTop -mt-40 bg-white">Past Events</h1>
    
    <div class="w-5/6 flex flex-wrap justify-around">
      @foreach($pasts as $past)
        <div class="w-1/4 rounded shadow-lg mx-10 mb-10">
          <img class = "rounded" src="{{ asset('img/test.jpg') }} "/>
          <div class="flex">

            <span class="inline-flex items-center justify-center h-6 w-6 text-red-500"><i class="mdi mdi-speedometer text-red-500 inline-flex"></i></span>
            <h1 class  = "my-5">21-NOV2021  21-NOV-2022</h1>
          </div>
        </div>
        @endforeach
    </div>

</section>

@endsection