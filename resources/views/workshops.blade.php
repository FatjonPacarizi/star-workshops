@extends('layouts.landinglayouts')

@section('content')
<section class = "relative">
  <img class = "inline-block w-full h-80 " src="{{ asset('img/banner.jpg') }} "/>
  <svg class="swirl absolute -bottom-1 w-full h-6 md:h-20 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3091 338" preserveAspectRatio="none">
    <path fill-rule="evenodd"  fill="rgb(229,231,235)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
    <path fill="url(#PSgrad_0)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
    </svg>
</section>
<section class="w-full pb-20 mb-8 flex justify-center  bg-gray-200  ">
  <div class="w-full lg:w-11/12 lg:pl-10 ">
    <div class="mx-10 lg:mx-7 ">
    <h1 class="mb-2 font-bold">EVENTS</h1>
    <h1 class="text-2xl ">UPCOMING EVENTS</h1>
  </div>
    <div class="w-full border flex flex-wrap   ">
      @foreach($upcomings as $upcoming)
        <div class="w-full relative rounded shadow-lg m-10  bg-white  sm:w-2/5 sm:mx-auto lg:w-1/4 lg:mx-7">
          <a  href = "{{route('single-workshop',$upcoming->id)}}">
            <div class="w-full h-3/4 bg-black absolute opacity-50"> </div>
            <img class = "w-full h-3/4 " src="{{$upcoming->img_workshop ? asset('/storage/' . $upcoming->img_workshop) : asset('/img/test.jpg')}}"/>           
          <h1 class  = " absolute top-0 left-0 text-white p-3 font-bold">{{$upcoming->name}}</h1>
          <div class="my-5"> 
          <div class="flex items-center">
              <i class="fa-solid fa-calendar-days text-gray-600 ml-5 mr-2 -mt-1"></i> 
              <h1 >{{$upcoming->time}}</h1>
           </div>
            <div class="flex items-center mt-2">
              <i class="fa-solid fa-user text-gray-600 ml-5 mr-2 -mt-1"></i>
              <h1 >{{$upcoming->author}}</h1>
           </div>
          </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
<section class="w-full pt-6 flex flex-col items-center  bg-white">

    <h1 class = "w-full p-20 text-center text-4xl roundedTop -mt-40 bg-white">Past Events</h1>
    
    <div class="w-full  mx-auto flex flex-wrap  lg:justify-center">
      @foreach($pasts as $past)
      <div class="w-full  relative rounded shadow-lg m-10  bg-white border sm:w-2/5 sm:mx-auto  lg:w-1/5 lg:m-7 ">
        <a  href = "{{route('single-workshop',$past->id)}}">
          <div class="w-full h-3/4 bg-black absolute opacity-50"> </div>
          <img class = "w-full h-3/4 " src="{{$past->img_workshop ? asset('/storage/' . $past->img_workshop) : asset('/img/test.jpg')}}"/>           
        <h1 class  = " absolute top-0 left-0 text-white p-3 font-bold">{{$past->name}}</h1>
        <div class="my-5">
          <div class="flex items-center">
            <i class="fa-solid fa-calendar-days text-gray-600 ml-5 mr-2 -mt-1"></i> 
            <h1 >{{$past->time}}</h1>
         </div>
          <div class="flex items-center mt-2">
            <i class="fa-solid fa-user text-gray-600 ml-5 mr-2 -mt-1"></i>
            <h1 >{{$past->author}}</h1>
         </div>
        </div>
     
        </a>
      </div>
        @endforeach
    </div>

</section>

@endsection