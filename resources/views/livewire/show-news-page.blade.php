    <div>
    <div class="flex flex-wrap -m-4">
        @foreach($newspages as $newspage)
        
        <div class="p-4 md:w-1/3">
          <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
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
        </div>
  
        @endforeach
            {{ $newspages->links()}}
      </div>
    </div>