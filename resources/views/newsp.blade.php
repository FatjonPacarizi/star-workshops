@extends('layouts.landinglayouts')
@section('content')

<section class="text-black body-font flex flex-col items-center">
  <div class="w-4/5 flex flex-wrap">
    <div class="w-full  lg:w-3/4  lg:pr-10 ">
      <img class="w-full lg:h-1/4 border-4 border-red-500 my-10 object-cover object-center rounded " 
          alt="" 
          src="{{$newspage->image ? asset('/storage/' . $newspage->image) : asset('/img/defaultNewsImg.jpg')}}">
        <div class="text-left lg:w-5/3 w-full">
          <h1 class="title-font sm:text-4xl text-4xl mb-4 font-medium text-black"><b>{{ $newspage->title }}</b></h1>
          <h2 class="tracking-widest text-xl title-font font-medium text-gray-500 mb-1"><b>{{ \Carbon\Carbon::parse($newspage->time)->format('d/m/Y')}}</b> - <b>{{ $newspage->user->name }}</b></h2>
          <p class="mb-8 py-5 text-xl text-gray-700">{!! $newspage->description !!}</p>
        </div>
    </div>
  <div class="w-4/5 mx-auto mt-10 lg:mt-0 lg:-ml-10 md:w-2/3 lg:w-1/4  ">
    @foreach($threenews as $newspage)
      <div class="mt-10 ml-14 border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
        <img class="lg:h-48 md:h-36 w-full object-cover object-center" alt="" src="{{$newspage->image ? asset('/storage/' . $newspage->image) : asset('/img/defaultNewsImg.jpg')}}">
        <div class="p-6">
          <a href="{{route('single-news',$newspage->id)}}" class="title-font text-lg font-medium text-gray-900 mb-3 underline">{{ $newspage->title }}</a>
          <p class="leading-relaxed mb-3">{!! Illuminate\Support\Str::limit($newspage->description, 100, $end='...') !!}</p>
          <h2 class="tracking-widest text-3xs title-font font-medium text-gray-500 mb-1 ">{{ \Carbon\Carbon::parse($newspage->time)->format('d/m/Y')}} - {{ $newspage->user->name }}</h2>
          <div class="flex items-center flex-wrap">
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
@endsection