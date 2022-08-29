@extends('layouts.landinglayouts')

@section('content')

<section class="text-black body-font">
  <div class="container mx-auto flex px-5 py-10 items-center justify-center flex-col">
    <img class="w-full mb-10 object-cover object-center rounded" alt="" src="{{$newspage->image_news ? asset('uploads/newspages/'.$newspage->image) : asset('/img/Workshops.jpg')}}">
    <div class="text-left lg:w-5/3 w-full">
      <h1 class="title-font sm:text-4xl text-4xl mb-4 font-medium text-black"><b>{{ $newspage->title }}</b></h1>
      <h2 class="tracking-widest text-xl title-font font-medium text-gray-500 mb-1"><b>{{ $newspage->time }}</b></h2>
      <p class="mb-8 py-5 text-xl text-gray-700">{!! $newspage->description !!}</p>
      <h2 class="tracking-widest text-base title-font font-medium text-gray-600 mb-1">{{ $newspage->author }}</h2>
    </div>
  </div>
</section>

@endsection