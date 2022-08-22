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
  <div class="container px-5 py-24 mx-auto flex flex-col">
    <div class="lg:w-4/6 mx-auto">
      <div class="rounded-lg h-64 overflow-hidden">
        <img alt="" class="object-cover object-center h-full w-full" src="{{ asset('uploads/newspages/'.$newspage[0]->image) }}">
      </div>
      <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
          <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-black text-lg">{{$newspage[0]->author}}</h2>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <h1 class="leading-relaxed font-bold text-lg mb-4">{{$newspage[0]->title}}</h1>
          <p class="leading-relaxed text-lg mb-4">{{$newspage[0]->description}}</p>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection