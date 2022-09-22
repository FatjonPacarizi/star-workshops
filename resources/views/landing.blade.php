@extends('layouts.landinglayouts')

@section('content')

<section class="text-white body-font bg-red-600 bg-red-600">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-1xl text-1xl mb-4 font-medium text-white">{{$landing->heading}}</h1>
      <div class="mb-8 leading-relaxed text-white">{!! $landing->paragraf !!}</div>
      <div class="flex justify-center">
        <a href="{{$landing->button}}" class="ml-4 inline-flex text-red-600 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-100 rounded-full text-lg">Read the full statement</a>
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
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-red-600">About Star Workshops</h1>
      <p class="mb-8 leading-relaxed">Our primary purpose is to improve the professionalism and competence of all those involved in nuclear security so that nuclear and other radioactive materials are not used for terrorist or other criminal purposes. This requires confidence that the management and regulatory systems that support nuclear security are effective against the postulated threats including physical, cyber and insiders, as well as combinations thereof. We support this objective by sharing best security practices and advocating for the professional certification of all personnel with responsibilities for nuclear security.</p>
      <div class="grid grid-cols-1 gap-6 w-full">
        <div class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
          <img class="object-cover w-full" alt="Map" src="{{ asset('img/map.jpg') }}">
          <div class="absolute inset-0 inset-y-32">
            <h4 class="mb-3 text-7xl font-semibold tracking-tight">
              <span class="text-red-900"> <b>5974</b></span><br>
              <span class="text-black">members worldwide in</span><br>
              <span class="text-red-900"><b>150 Countries</b></span>
            </h4>
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
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Workshops and Training
      </h1>
      <p class="mb-8 leading-relaxed">Our professionally facilitated workshops and training courses provide excellent learning and peer-to-peer networking opportunities with a cross-section of the nuclear industry—from licensees and regulators to security experts, academics, law enforcement and vendors.</p>
      <div class="flex justify-center">
        <button class="ml-4 mb-2 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded-full text-lg"><a href="{{route('workshops')}}">Find out more</a></button>
      </div>
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <img class="object-cover object-center rounded" alt="Workshops and Training" src="{{ asset('img/Workshops.jpg') }}">
    </div>
  </div>
  <svg class="swirl w-full h-6 md:h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
    <path fill="white" d="M0,100 Q50,1 100,100"></path>
  </svg>
</section>

<section class="text-black body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <img class="object-cover object-center rounded" alt="Academy" src="{{ asset('img/Picture.png') }}">
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-red-600">Star Workshops Academy
      </h1>
      <p class="mb-8 leading-relaxed">The Star Workshops Academy is the world’s first certified professional development programme for individuals with responsibilities in nuclear or radioactive source security management.</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg hover:bg-red-800 duration-300"><a href="/members">Find out more<a></button>
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
        <div class="h-full border-2 bg-white border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
          <img class="lg:h-48 md:h-36 w-full object-cover object-center" alt="" src="{{$newspage->image ? asset('/storage/' . $newspage->image) : asset('/img/defaultNewsImg.jpg')}}">
          <div class="p-6 ">
            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $newspage->title }}</h1>
            <p class="leading-relaxed text-gray-700 mb-3">{!! Illuminate\Support\Str::limit($newspage->description, 50, $end='...') !!}</p>
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
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium ">Evaluation
      </h1>
      <p class="mb-8 leading-relaxed">Star Workshops evaluation services help licensees assess the maturity of their security programme, measure the effectiveness of their security culture, and identify areas that are strong as well as those that could be improved.</p>
      <div class="flex justify-center">
        <button class="ml-4 mb-2 inline-flex text-white  border-0 py-2 px-6 focus:outline-none bg-red-600 hover:bg-red-700 rounded-full text-lg"><a href="{{route('workshops')}}">Find out more</a></button>
      </div>
    </div>
    <div class=" md:w-1/2 border relative  mt-10 md:mt-0 py-10  rounded-l-3xl bg-gray-200 md:pl-16 flex justify-end text-center">
      <div class="absolute w-2/3 rounded-l-3xl h-full right-0 top-0  bg-red-600 "></div>
      <img class="w-11/12 object-cover object-center  rounded-l-3xl z-10" alt="Workshops and Training" src="{{ asset('img/Evaluation.jpg') }}">
    </div>
  </div>
 
</section>

<section class="text-white body-font bg-red-600">
  <div class="container px-5 py-24 mx-auto">
    <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
        <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
      </svg>
      <p class="text-white">MEMBER STORIES</p>
      <p class="leading-relaxed text-lg">I firmly believe the Star Workshops certification programmes will help change perceptions, towards nuclear security and will lead to greater security globally as more and more people enroll and build competence in their areas of responsibility.</p>
      <span class="inline-block h-1 w-10 rounded bg-red-500 mt-8 mb-6"></span>
      <h2 class="text-white font-medium title-font tracking-wider text-sm">Ramadan Gashi, Web developer</h2>
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
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-red-600">Popular Courses</h1>
      <p class="mb-8 leading-relaxed">Star Workshops Academy courses focus on the practitioner and provide best practice guidance that is hands-on, cross-functional and immediately useful. To read more click the button below:</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg hover:bg-red-800 duration-300"><a href="{{route('workshops')}}">View all courses</a></button>
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
      <img class="object-cover object-center rounded" alt="Star Workshops Scholarships" src="{{ asset('img/team1.png') }}">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-18 md:pl-68 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Star Workshop Company
      </h1>
      <p class="mb-8 leading-relaxed">We partner up with our clients by setting up, managing and operating their extended teams across Software Development, Quality Assurance, Customer Support, Technical Support and Business process outsourcing services. We make sure that our teams remain satisfied and therefore dedicated to our client’s needs. This makes us reliable, effective and productive. We offer a stress-free workplace, with recreative environments and competitive working conditions with the biggest tech Companies in Kosovo. </p>
      <div class="flex justify-center">
        <button class="ml-4 inline-flex text-red-600 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded-full text-lg"><a href="https://www.starlabs.dev/whyus/">Learn more</a></button>
      </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="Star Workshops Scholarships" src="{{ asset('img/team2.png') }}">
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


<button id="to-top-button" onclick="goToTop()" title="Go To Top" class="hidden fixed z-40 bottom-8 right-8 border-0 w-16 h-16 rounded-full bg-red-600 ring-2 ring-white text-white -rotate-90 text-5xl font-bold">&#10132;</button>


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