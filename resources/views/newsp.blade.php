@extends('layouts.landinglayouts')

@section('content')

<section class="text-black body-font flex flex-col items-center">
  <div class="w-11/12 flex flex-wrap">
  <div class="w-full lg:w-3/4  lg:pr-10 ">
    <img class="w-full h-1/4 border-4 border-red-500 my-10 object-cover object-center rounded " alt="" src="{{$newspage->image ? asset('/storage/' . $newspage->image) : asset('/img/defaultNewsImg.jpg')}}">
    <div class="text-left lg:w-5/3 w-full">
      <h1 class="title-font sm:text-4xl text-4xl mb-4 font-medium text-black"><b>{{ $newspage->title }}</b></h1>
      <h2 class="tracking-widest text-xl title-font font-medium text-gray-500 mb-1"><b>{{ $newspage->time }}</b> - <b>{{ $newspage->author }}</b></h2>
      <p class="mb-8 py-5 text-xl text-gray-700">{!! $newspage->description !!}</p>
    </div>
  </div>
  <div class="w-11/12 mx-auto mt-20 lg:mt-0 lg:-ml-10 md:w-2/3 lg:w-1/4  ">
    @foreach($threenews as $newspage)
      <div class="mt-10 border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
        <img class="lg:h-48 md:h-36 w-full object-cover object-center" alt="" src="{{$newspage->image ? asset('/storage/' . $newspage->image) : asset('/img/defaultNewsImg.jpg')}}">
        <div class="p-6">
          <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $newspage->title }}</h1>
          <p class="leading-relaxed mb-3">{!! Illuminate\Support\Str::limit($newspage->description, 100, $end='...') !!}</p>
          <h2 class="tracking-widest text-3xs title-font font-medium text-gray-500 mb-1">{{ $newspage->time }} - {{ $newspage->author }}</h2>
          <div class="flex items-center flex-wrap ">
            <a class="text-red-600 inline-flex items-center md:mb-2 lg:mb-0" href="{{route('single-news',$newspage->id)}}">Read More
              <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
  <a href="/newspage" class="tracking-widest text-xl title-font font-medium text-gray-500 mb-4">Show more </a>
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