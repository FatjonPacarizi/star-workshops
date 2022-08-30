@extends('layouts.landinglayouts')

@section('content')
<section>
  <div class="md:container md:mx-auto px-5 xl:px-0">
      <h1 class="pb-16 pt-48 text-6xl md:w-full text-center"> <span>
          <p><strong><span style="color: #ff0000;">OUR LATEST</span></strong></p>
        </span> STORIES!</h1>
  </div>
</section>

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-4">
      @foreach($newspages as $newspage)
      <div class="p-4 md:w-1/3">
        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
          <img class="lg:h-48 md:h-36 w-full object-cover object-center" alt="" src="{{$newspage->image_news ? asset('uploads/newspages/'.$newspage->image) : asset('/img/Workshops.jpg')}}">
          <div class="p-6">
            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $newspage->title }}</h1>
            <p class="leading-relaxed mb-3">{!! Illuminate\Support\Str::limit($newspage->description, 100, $end='...') !!}</p>
            <h2 class="tracking-widest text-3xs title-font font-medium text-gray-500 mb-1">{{ $newspage->time }} - {{ $newspage->author }}</h2>
            <div class="flex items-center flex-wrap ">
              <a class="text-red-600 inline-flex items-center md:mb-2 lg:mb-0" href = "{{route('single-news',$newspage->id)}}">Read More
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      
      @endforeach
    </div>
   
  </div>
  <div class="justfy-center pt-6 flex flex-col items-center mb-10">
                            {{ $newspages->links() }}
                  </div>
</section>

@endsection


      