@extends('layouts.landinglayouts')

@section('content')

<section class="text-black body-font">
  <div class="container mx-auto flex px-5 py-10 items-center justify-center flex-col">
    <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="" src="{{$newspage->image_news ? asset('uploads/newspages/'.$newspage->image) : asset('/img/Workshops.jpg')}}">
    <div class="text-center lg:w-5/3 px-12 w-full">
      <h2 class="tracking-widest text-xl title-font font-medium text-gray-700 mb-1">{{ $newspage->author }}</h2>
      <h1 class="title-font sm:text-3xl text-3xl mb-4 font-medium text-red-600"><b>{{ $newspage->title }}</b></h1>
      <p class="mb-8 text-justify leading-relaxed">{!! $newspage->description !!}</p>
    </div>
  </div>
</section>

@endsection