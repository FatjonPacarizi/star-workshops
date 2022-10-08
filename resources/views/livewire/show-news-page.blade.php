<div class = "flex flex-col  items-center">
    <div class="flex flex-wrap  -m-4">
        @foreach($newspages as $newspage)
        
        <div class="p-4 md:w-1/3">
          <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden relative">
            <img class="lg:h-48 md:h-36 w-full object-cover object-center" alt="" src="{{$newspage->image ? asset('/storage/' . $newspage->image) : asset('/img/defaultNewsImg.jpg')}}">
            <div class="p-6">
              <a href="{{route('single-news',$newspage->id)}}" class="title-font text-lg font-medium text-gray-900 underline">{{ $newspage->title }}</a>
              <p class="leading-relaxed mb-3">{!! Illuminate\Support\Str::limit($newspage->description, 100, $end='...') !!}</p>
              <h2 class="tracking-widest text-3xs title-font font-medium text-gray-500 mb-1">{{ \Carbon\Carbon::parse($newspage->time)->format('d/m/Y')}} - {{ $newspage->user->name }}</h2>
              <div class="flex items-center flex-wrap absolute bottom-0">
                <a class="text-red-600 inline-flex items-center md:mb-2 lg:mb-1" href="{{route('single-news',$newspage->id)}}">Read More
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

      <div class="flex justfy-center pt-6 flex flex-col items-center mb-10"> 
        <div wire:loading.remove class = "h-12">{{ $newspages->links() }}</div>

        <div class="w-full flex justify-center ">
            <div role="status" wire:loading>
              <svg aria-hidden="true" class="mr-2 w-8 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                  <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
              </svg>
              <span class="sr-only">Loading...</span>
          </div>
        </div>
    </div>
</div>