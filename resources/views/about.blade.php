<x-app-layout >




<section class="body-font bg-white-600">

<img src="{{ asset('img/2.png') }}" alt="">

  <div class="text-red-600 container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
    @php
                               $about = App\Models\About::find(1);
                        @endphp <p class="mb-8 leading-relaxed">{{$about->title}}
</p>
@php
                               $about = App\Models\About::find(1);
                        @endphp  <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">{{$about->heading}}</h1>
                        @php
                               $about = App\Models\About::find(1);
                        @endphp   <p>
    
                        {{$about->paragraf}}  <div class="flex justify-center">
       <a href="{{url('https://www.starlabs.dev/')}}"> <button style="    margin-top: 20px;
    margin-left: -4px;"class="ml-4 inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded-full text-lg">Find out more</button>
      </a></div>
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
    @php
                               $about = App\Models\About::find(1);
                        @endphp
<img src="{{ asset('uploads/abouts/'.$about->image) }}" alt="">  </div>
  </div>
</section>




</x-app-layout>