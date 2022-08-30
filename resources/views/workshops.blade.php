@extends('layouts.landinglayouts')

@section('content')
<section class="relative">
  <img class="inline-block w-full h-80 " src="{{ asset('img/banner.jpg') }} " />
  <svg class="swirl absolute -bottom-1 w-full h-6 md:h-20 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3091 338" preserveAspectRatio="none">
    <path fill-rule="evenodd" fill="rgb(229,231,235)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
    <path fill="url(#PSgrad_0)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
  </svg>
</section>
<section class="w-full pb-20 mb-8 flex justify-center  bg-gray-200  ">
  <div class="div">
    <div class="mx-2 ">
      <h1 class="mb-2 font-bold text-gray-500">EVENTS</h1>
      <h1 class="text-3xl mb-10 text-[#00517E]">Upcoming Events</h1>
    </div>
    <div class=" flex flex-wrap">
      @foreach($upcomings as $upcoming)
      <div class="card  relative rounded shadow-lg  bg-white cursor-pointer ">
        <a href="{{route('single-workshop',$upcoming->id)}}">
          <div class="opacity"></div>
          <img class="img" src="{{$upcoming->img_workshop ? asset('/storage/' . $upcoming->img_workshop) : asset('/img/test.jpg')}}" />
          <h1 class=" absolute top-0 left-0 text-white p-5 font-bold text-lg">{{$upcoming->name}}</h1>
          <div class="my-5">
            <div class="flex items-center">
              <i class="fa-solid fa-calendar-days text-gray-500 ml-5 mr-2 -mt-1 "></i>
              <h1 class="uppercase  font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600">{{ \Carbon\Carbon::parse($upcoming->time)->format('d-F-Y') }}
              </h1>
            </div>
            <div class="flex items-center mt-2">
              <i class="fa-solid fa-user text-gray-500 ml-5 mr-2 -mt-1"></i>
              <h1 class="uppercase  font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600">{{$upcoming->author}}</h1>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    <div class="flex justfy-center p-3" {{ $upcomings->links() }} </div>
    </div>

</section>

<section class="w-full pt-6 flex flex-col items-center mb-10 bg-white">
  <h1 class="w-full pt-20 pb-10 text-center text-4xl roundedTop -mt-40 bg-white">Past Events</h1>
  <div class="div">
    <div class=" flex flex-wrap ">
      @foreach($pasts as $past)
      <div class="card  relative rounded shadow-lg  bg-white cursor-pointer ">
        <a href="{{route('single-workshop',$past->id)}}">
          <div class="opacity"></div>
          <img class="img grayscale  " src="{{$past->img_workshop ? asset('/storage/' . $past->img_workshop) : asset('/img/test.jpg')}}" />
          <h1 class=" absolute top-0 left-0 text-white p-5 font-bold text-lg">{{$past->name}}</h1>
          <div class="my-5">
            <div class="flex items-center">
              <i class="fa-solid fa-calendar-days text-gray-500 ml-5 mr-2 -mt-1"></i>
              <h1 class="uppercase  font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600">{{\Carbon\Carbon::parse($past->time)->format('d-F-Y') }}</h1>
            </div>
            <div class="flex items-center mt-2">
              <i class="fa-solid fa-user text-gray-500 ml-5 mr-2 -mt-1"></i>
              <h1 class="uppercase  font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600">{{$past->author}}</h1>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    <div class="flex justfy-center p-3" {{ $pasts->links() }} </div>
    </div>

</section>

<button id="to-top-button" onclick="goToTop()" title="Go To Top" class="hidden fixed z-90 bottom-8 right-8 border-0 w-16 h-16 rounded-full bg-red-600 ring-2 ring-white text-white -rotate-90 text-5xl font-bold">&#10132;</button>


<!-- Javascript code -->
<script>
  var toTopButton = document.getElementById("to-top-button");
  // When the user scrolls down 200px from the top of the document, show the button
  window.onscroll = function() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
      toTopButton.classList.remove("hidden");
    } else {
      toTopButton.classList.add("hidden");
    }
  }
  // When the user clicks on the button, scroll to the top of the document
  function goToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }
</script>
@endsection