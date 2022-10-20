@extends('layouts.landinglayouts')

@section('content')

<section class="text-white body-font bg-red-600 bg-red-600 pt-24">
  <div class="container mx-auto flex flex-col relative px-5 py-24 items-center justify-center">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-1xl text-1xl mb-4 font-medium text-white">{{$section1->heading}}</h1>
      <div class="mb-8 leading-relaxed text-white">{!! $section1->paragraf_1 !!}</div>
      <div class="flex justify-center">
        <a href="{{$section1->button}}" class="ml-4 inline-flex text-red-600 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-100 rounded-full text-lg">Read the full statement</a>
      </div>
    </div>
    @if(Auth::check())
    @if(Auth::user()->user_status == 'user')
    <div class="min-w-32 bg-white min-h-32 p-1 mt-5 lg:absolute right-10 mb-2 font-medium">
      <div class="w-32 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-lg ">
          <div class="block rounded-t overflow-hidden  text-center text-black">
            <div class="bg-red-500 text-white py-1">
            {{Carbon\Carbon::now()->format('F')}}
            </div>
            <div class="pt-1 border-l border-r border-grey-500 bg-white ">
              <span class="text-5xl font-bold leading-tight">
              {{Carbon\Carbon::now()->format('d')}}
              </span>
            </div>
            <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white pt-2 mb-1 ">
              <span class="text-sm">
              {{Carbon\Carbon::now()->format('D')}}
              </span>
            </div>
            <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white ">
              <span class="text-xs leading-normal">
              @if($workshop > '{{Carbon\Carbon::now()}}')
              {{$workshop->name}}<br>
              <p class="text-red-600"><b>{{\Carbon\Carbon::parse($workshop->time)->diffForHumans()}}</b></p>
              @else 
              <p>No Upcoming Workshops</p>
              @endif
              </span>
            </div>
          </div>
      </div>
    </div>@endif
    @endif
</div>
  <svg class="swirl w-full h-6 md:h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
    <path fill="white" d="M0,100 Q50,1 100,100"></path>
  </svg>
</section>

<section class="text-black body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-red-600">{{$section2->heading}}</h1>
      <p class="mb-8 leading-relaxed">{!! $section2->paragraf_1 !!}</p>
      <div class="grid grid-cols-1 gap-6 w-full">
        <div class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
          <img class="object-cover w-full" alt="Map" src="{{$section2->img_1 ? asset('/storage/' . $section2->img_1) : asset('/img/section2_defaultimg.png')}}" >
          <div class="absolute inset-0 inset-y-32">
            <h4 class="mb-3 text-7xl font-semibold tracking-tight">{!! $section2->paragraf_2 !!}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <svg class="swirl w-full h-6 md:h-20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 2880 235" preserveAspectRatio="none">
    <path fill-rule="evenodd" fill="#dc2626" d="M2880.000,235.000 L2880.000,7.000 C2880.001,7.110 1931.895,-43.199 1417.644,136.038 C911.386,283.052 300.817,178.121 -0.000,37.000 C-0.000,203.528 -0.000,235.000 -0.000,235.000 "></path>
    <path fill="url(#PSgrad_0)" d="M2880.000,235.000 L2880.000,7.000 C2880.001,7.110 1931.895,-43.199 1417.644,136.038 C911.386,283.052 300.817,178.121 -0.000,37.000 C-0.000,203.528 -0.000,235.000 -0.000,235.000 "></path>
  </svg>
</section>

<section class="text-white body-font bg-red-600">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">{{$section3->heading}}
      </h1>
      <p class="mb-8 leading-relaxed">{!! $section3->paragraf_1 !!}</p>
      <div class="flex justify-center">
        <button class="my-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded-full text-lg"><a href="{{$section3->button}}">Find out more</a></button>
      </div>
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <img class="object-cover object-center rounded" alt="Workshops and Training" src="{{$section3->img_1 ? asset('/storage/' . $section3->img_1) : asset('/img/section3_defaultimg.png')}}">
    </div>
  </div>
  <svg class="swirl w-full h-6 md:h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
    <path fill="white" d="M0,100 Q50,1 100,100"></path>
  </svg>
</section>

<section class="text-black body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <img class="object-cover object-center rounded" alt="Academy" src="{{$section4->img_1 ? asset('/storage/' . $section4->img_1) : asset('/img/section4_defaultimg.png')}}">
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-red-600">{{$section4->heading}}
      </h1>
      <p class="mb-8 leading-relaxed">{!! $section4->paragraf_1 !!}</p>
      <div class="flex justify-center">
        <button class="my-4 inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg hover:bg-red-800 duration-300"><a href="{{$section4->button}}">Find out more<a></button>
      </div>
    </div>
  </div>
  <svg class="swirl w-full h-6 md:h-20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3091 330" preserveAspectRatio="none">
    <path fill-rule="evenodd" fill-opacity="red" fill="#dc2626" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
    <path fill="url(#PSgrad_0)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
  </svg>
</section>

<section class="text-white bg-red-600 body-font">
  <div class="container px-5 py-10 mx-auto">
    <div class="flex flex-col text-center w-full mb-4 mt-4">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white font-bold">Latest News</h1>
    </div>
    <div class="flex flex-wrap -m-4">
      @foreach($newspage as $newspage)
      <div class="p-4 md:w-1/3">
        <div class="h-full border-2 bg-white border-gray-200 border-opacity-60 rounded-lg overflow-hidden relative">
          <img class="lg:h-48 md:h-36 w-full object-cover object-center" alt="" src="{{$newspage->image ? asset('/storage/' . $newspage->image) : asset('/img/defaultNewsImg.jpg')}}">
          <div class="p-6 ">
            <a href="{{route('single-news',$newspage->id)}}" class="title-font text-lg font-medium text-gray-900 mb-3 underline">{{ $newspage->title }}</a>
            <p class="leading-relaxed text-gray-700 mb-3">{!! Illuminate\Support\Str::limit($newspage->description, 50, $end='...') !!}</p>
            <h2 class="tracking-widest text-3xs title-font font-medium text-gray-500 mb-1">{{ \Carbon\Carbon::parse($newspage->time)->format('d/m/Y')}} - {{ $newspage->user->name }}</h2>
            <div class="flex items-center flex-wrap absolute bottom-0">
              <a class="text-red-600 inline-flex items-center md:mb-2 lg:mb-3" href="{{route('single-news',$newspage->id)}}">Read More
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
    <button class="flex mx-auto mt-16 text-red-600 bg-white border-0 py-2 px-8 focus:outline-none rounded-full text-lg "><a href="http://127.0.0.1:8000/newspage">View all news</a></button>
  </div>
  <svg class="swirl w-full h-6 md:h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
    <path fill="white" d="M0,100 Q50,1 100,100"></path>
  </svg>
</section>

<section class="w-full text-white body-font">
  <div class=" w-full flex flex-wrap  py-24 justify-between items-center ">
    <div class=" md:w-1/2 lg:px-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center text-black ">
      <h1 class="title-font sm:text-4xl text-3xl mb-2 font-medium ">{{$section5->heading}}
      </h1>
      <p class="mb-8 leading-relaxed">{!!$section5->paragraf_1!!}</p>
      <div class="flex justify-center">
        <button class="my-4 inline-flex text-white  border-0 py-2 px-6 focus:outline-none bg-red-600 hover:bg-red-700 rounded-full text-lg"><a href="{{$section5->button}}">Find out more</a></button>
      </div>
    </div>
    <div class=" md:w-1/2 border relative  mt-10 md:mt-0 py-10  rounded-l-3xl bg-gray-200 md:pl-16 flex justify-end text-center">
      <div class="absolute w-2/3 rounded-l-3xl h-full right-0 top-0  bg-red-600 "></div>
      <img class="w-11/12 object-cover object-center  rounded-l-3xl z-10" alt="Workshops and Training" src="{{$section5->img_1 ? asset('/storage/' . $section5->img_1) : asset('/img/section5_defaultimg.png')}}">
    </div>
  </div>
 
</section>

<section class="text-white body-font bg-red-600">
  <div class="container px-5 py-24 mx-auto">
    <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
        <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
      </svg>
      <p class="text-white">{{$section6->heading}}</p>
      <p class="leading-relaxed text-lg">{!!$section6->paragraf_1!!}</p>
      <span class="inline-block h-1 w-10 rounded bg-red-500 mt-8 mb-6"></span>
      <h2 class="text-white font-medium title-font tracking-wider text-sm">{!!$section6->paragraf_2!!}</h2>
      <div class="flex justify-center">
        @if(!Auth::check())
        <button class="my-4 ml-4 inline-flex text-red-600 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded-full text-lg"><a href="http://127.0.0.1:8000/register">Become a member</a></button>
        @endif
      </div>
    </div>
  </div>
  <svg class="swirl w-full h-6 md:h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
    <path fill="white" d="M0,100 Q50,1 100,100"></path>
  </svg>
</section>

<section class="text-black body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-red-600">{{$section7->heading}}</h1>
      <p class="mb-8 leading-relaxed">{!!$section7->paragraf_1!!}</p>
      <div class="flex justify-center">
        <button class="my-4 inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg hover:bg-red-800 duration-300"><a href="{{$section7->button}}">View all courses</a></button>
      </div>
    </div>
  </div>
  <svg class="swirl w-full h-6 md:h-20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3091 330" preserveAspectRatio="none">
    <path fill-rule="evenodd" fill-opacity="red" fill="#dc2626" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
    <path fill="url(#PSgrad_0)" d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 "></path>
  </svg>
</section>

<section class="text-white body-font bg-red-600">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="Star Workshops Scholarships" src="{{$section8->img_1 ? asset('/storage/' . $section8->img_1) : asset('/img/section8_defaultimg1.png')}}">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-18 md:pl-68 flex flex-col  md:text-left items-center text-center">
      <h1 class="w-full title-font sm:text-4xl text-3xl mb-4 font-medium text-white">{{$section8->heading}}
      </h1>
      <p class="mb-8 leading-relaxed">{!!$section8->paragraf_1!!}</p>
      <div class="flex justify-center">
        <button class="my-4 inline-flex text-red-600 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded-full text-lg"><a href="{!!$section7->button!!}">Learn more</a></button>
      </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="Star Workshops Scholarships" src="{{$section8->img_2 ? asset('/storage/' . $section8->img_2) : asset('/img/section8_defaultimg2.png')}}">
    </div>
  </div>
  <svg class="swirl w-full h-6 md:h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
    <path fill="white" d="M0,100 Q50,1 100,100"></path>
  </svg>
</section>

<section class="w-full pb-20 mb-8 flex justify-center body-font">
  <div class="div">
    <div class="flex flex-col text-center w-full mb-20 mt-16">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-red-600 font-bold">Latest Events</h1>
      <p>Star workshops, training courses, roundtables and webinars are innovative, thought-provoking and collaborative. We invite you to join us at an upcoming event.</p>
    </div>
    <div class=" flex flex-wrap ">
      @foreach($upcomings as $workshop)
      <div class="card  relative rounded shadow-lg  bg-white cursor-pointer ">
        <a href="{{route('single-workshop',$workshop->id)}}">
          <div class="opacity"></div>
          <img class="img" src="{{$workshop->img_workshop ? asset('/storage/' . $workshop->img_workshop) : asset('/img/test.jpg')}}" />
          <h1 class=" absolute top-0 left-0 text-white p-5 font-bold text-lg">{{$workshop->name}}</h1>
          <div class="my-5">
            <div class="flex items-center">
              <i class="fa-solid fa-calendar-days text-gray-500 ml-5 mr-2 -mt-1 "></i>
              <h1 class="uppercase  font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600">{{ \Carbon\Carbon::parse($workshop->time)->format('d-F-Y') }}
              </h1>
            </div>
            <div class="flex items-center mt-2">
              <i class="fa-solid fa-user text-gray-500 ml-5 mr-2 -mt-1"></i>
              <h1 class="uppercase  font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600">{{$workshop->user->name}}</h1>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
    <button class="flex mx-auto mt-16 text-white bg-red-600 border-0 py-2 px-8 focus:outline-none rounded-full text-lg hover:bg-red-800 duration-300"><a href="http://127.0.0.1:8000/workshops">View all events</a></button>
  </div>
</section>
@endsection