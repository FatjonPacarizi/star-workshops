@extends('layouts.landinglayouts')

@section('content')

<section class="text-black body-font">
  <div class="container mx-auto flex px-5 py-10 items-center justify-center flex-col">
    <img class="w-full mb-10 object-cover object-center rounded" alt="" src="{{$newspage->image ? asset('/storage/' . $newspage->image) : asset('/img/defaultNewsImg.jpg')}}">
    <div class="text-left lg:w-5/3 w-full">
      <h1 class="title-font sm:text-4xl text-4xl mb-4 font-medium text-black"><b>{{ $newspage->title }}</b></h1>
      <h2 class="tracking-widest text-xl title-font font-medium text-gray-500 mb-1"><b>{{ $newspage->time }}</b> - <b>{{ $newspage->author }}</b></h2>
      <p class="mb-8 py-5 text-xl text-gray-700">{!! $newspage->description !!}</p>
    </div>
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