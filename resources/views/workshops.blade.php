@extends('layouts.landinglayouts')
@section('content')

<section class="relative">
  <img class="inline-block w-full h-80 " src="{{$workshopPageData->img ? asset('/storage/' . $workshopPageData->img) : asset('/img/defaultWorkshopPageImg.png')}}" />
  <svg class="swirl absolute -bottom-1 w-full h-6 md:h-20 " xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3091 338" preserveAspectRatio="none">
    <path fill-rule="evenodd" fill="rgb(229,231,235)"
      d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 ">
    </path>
    <path fill="url(#PSgrad_0)"
      d="M1.000,334.000 L0.000,205.000 C0.000,205.000 587.208,-196.779 1435.424,126.865 C2283.640,450.508 3075.779,281.603 3090.000,282.000 C3090.871,282.610 3091.000,338.000 3091.000,338.000 ">
    </path>
  </svg>
</section>
<section class="w-full pb-20 mb-8 flex justify-center  bg-gray-200  ">
  <div class="div">
    <div class="mx-2 mt-4 md:mt-0">
      <h1 class="mb-2 font-bold text-gray-500">{{$workshopPageData->heading}}</h1>
      <h1 class="text-3xl mb-10 text-[#00517E]">{{$workshopPageData->paragraf_1}}</h1>
    </div>
    <livewire:show-upcoming-workshops-page>
  </div>
</section>

<section class="w-full pt-6 flex flex-col items-center mb-10 bg-white">
  <h1 class="w-full pt-20 pb-10 text-center text-4xl roundedTop -mt-40 bg-white">{{$workshopPageData->paragraf_2}}</h1>
  <div class="div">
    <livewire:show-pasts-workshops-page>
  </div>
</section>
@endsection