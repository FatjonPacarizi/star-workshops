@extends('layouts.landinglayouts')

@section('content')


<section class="text-white body-font  bg-red-600">
  <div class="container-fluid mx-auto flex px-5 py-24 justify-left flex-col">
    <div class="lg:w-2/3 w-full">

<section class="text-white body-font bg-red-600 bg-red-600">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <div class="text-center lg:w-2/3 w-full">

      <h1 class="title-font sm:text-1xl text-1xl mb-4 font-medium text-white">A STAR WORKSHOPS SPECIAL MESSAGE</h1>
      <p class="mb-8 leading-relaxed text-white text-3xl">Star Workshops condemns any military attacks on Ukraine’s nuclear infrastructure and expresses its support for those working hard to protect and secure these sites.</p>
      <div class="flex justify-center">
        <button class="ml-4 inline-flex text-red-600 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-100 rounded-full text-lg">Read the full statement</button>
      </div>
    </div>
  </div>
</section>

<section class="text-gray-600 body-font">
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
</section>

<section class="text-white body-font bg-red-600">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Workshops and Training
      </h1>
      <p class="mb-8 leading-relaxed">Our professionally facilitated workshops and training courses provide excellent learning and peer-to-peer networking opportunities with a cross-section of the nuclear industry—from licensees and regulators to security experts, academics, law enforcement and vendors.</p>
      <div class="flex justify-center">
        <button class="ml-4 mb-2 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded-full text-lg">Find out more</button>
      </div>
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <img class="object-cover object-center rounded" alt="Workshops and Training" src="{{ asset('img/Workshops.png') }}">
    </div>
  </div>
</section>

<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <img class="object-cover object-center rounded" alt="Academy" src="{{ asset('img/Picture.png') }}">
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-red-600">Star Workshops Academy
      </h1>
      <p class="mb-8 leading-relaxed">The Star Workshops Academy is the world’s first certified professional development programme for individuals with responsibilities in nuclear or radioactive source security management.</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg">Find out more</button>
      </div>
    </div>
  </div>
</section>

<section class="text-white body-font bg-red-600">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Knowledge Centre
      </h1>
      <p class="mb-8 leading-relaxed">The Knowledge Centre gives Star Workshops Members access to a constantly expanding archive of information on nuclear security, both from Star Workshops and from external sources.</p>
      <div class="flex justify-center">
        <button class="ml-4 mb-2 inline-flex text-red-600 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded-full text-lg">Find out more</button>
      </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="Knowledge Centre" src="{{ asset('img/book.png') }}">
    </div>
  </div>
</section>

<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <img class="object-cover object-center rounded" alt="Evaluation" src="{{ asset('img/Evaluation.jpg') }}">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pl-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-red-600">Evaluation
      </h1>
      <p class="mb-8 leading-relaxed">Star Workshops evaluation services help licensees assess the maturity of their security programme, measure the effectiveness of their security culture, and identify areas that are strong as well as those that could be improved.</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg">Find out more</button>
      </div>
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
      <p class="leading-relaxed text-lg">I firmly believe the Star Workshops certification programmes will help change perceptions towards nuclear security and will lead to greater security globally as more and more people enroll and build competence in their areas of responsibility.</p>
      <span class="inline-block h-1 w-10 rounded bg-red-500 mt-8 mb-6"></span>
      <h2 class="text-white font-medium title-font tracking-wider text-sm">Raymond Agalga, Ghana</h2>
      <div class="flex justify-center">
        <button class="my-4 ml-4 inline-flex text-red-600 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded-full text-lg">Become a member</button>
      </div>
    </div>
  </div>
</section>

<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-red-600">Popular Courses</h1>
      <p class="mb-8 leading-relaxed">Star Workshops Academy courses focus on the practitioner and provide best practice guidance that is hands-on, cross-functional and immediately useful. To read more click the button below:</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg">View all courses</button>
      </div>
    </div>
  </div>
</section>

<section class="text-white body-font bg-red-600">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="Star Workshops Scholarships" src="{{ asset('img/Scholarships1.png') }}">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Star Workshops Scholarships
      </h1>
      <p class="mb-8 leading-relaxed">Thanks to the generous support of our funders, we are able to provide an extensive number of scholarships to individuals who wish to enrol in the Star Workshops Academy. Women and individuals from official development assistance (ODA) countries--as designated by the OECD--are especially encouraged to apply.</p>
      <div class="flex justify-center">
        <button class="ml-4 inline-flex text-red-600 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded-full text-lg">Learn more</button>
      </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded" alt="Star Workshops Scholarships" src="{{ asset('img/Scholarships2.png') }}">
    </div>
  </div>
</section>

<section class="text-red-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-red-600">Latest News</h1>
    </div>
    <div class="flex flex-wrap">
      <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
        <h2 class="text-lg sm:text-xl  font-medium title-font mb-2 text-red-600">28 July 2022</h2>
        <p class="leading-relaxed text-base mb-4">Setting the Standard: An Interview with Thailand’s OAP</p>
        <a class="text-red-500 inline-flex items-center">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
        <h2 class="text-lg sm:text-xl font-medium title-font mb-2 text-red-600">28 July 2022</h2>
        <p class="leading-relaxed text-base mb-4">Setting the Standard: An Interview with Thailand’s OAP</p>
        <a class="text-red-500 inline-flex items-center">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
        <h2 class="text-lg sm:text-xl font-medium title-font mb-2 text-red-600">28 July 2022</h2>
        <p class="leading-relaxed text-base mb-4">Setting the Standard: An Interview with Thailand’s OAP</p>
        <a class="text-red-500 inline-flex items-center">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
        <h2 class="text-lg sm:text-xl font-medium title-font mb-2 text-red-600">28 July 2022</h2>
        <p class="leading-relaxed text-base mb-4">Setting the Standard: An Interview with Thailand’s OAP</p>
        <a class="text-red-500 inline-flex items-center">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
    <button class="flex mx-auto mt-16 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded-full text-lg">View all news</button>
  </div>
</section>

@endsection