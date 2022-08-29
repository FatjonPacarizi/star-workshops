@extends('layouts.landinglayouts')

@section('content')
<section class="relative ">
  <img class="inline-block w-full h-80 " src="{{ asset('img/meet-the-team.jpg') }} " />
  <svg class="swirl absolute -bottom-1 w-full h-6 md:h-20 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3091 338" preserveAspectRatio="none">
    <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
    <path fill="url(#PSgrad_0)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
  </svg>
</section>

<section class="text-black body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="" src="{{$newspage->image_news ? asset('uploads/newspages/'.$newspage->image) : asset('/img/Workshops.jpg')}}">
    <div class="text-center lg:w-2/3 w-full">
      <h2 class="tracking-widest text-xl title-font font-medium text-gray-700 mb-1">{{ $newspage->author }}</h2>
      <h1 class="title-font sm:text-3xl text-3xl mb-4 font-medium text-black">{{ $newspage->title }}</h1>
      <p class="mb-8 leading-relaxed">{!! $newspage->description !!}</p>
    </div>
  </div>
</section>

@endsection