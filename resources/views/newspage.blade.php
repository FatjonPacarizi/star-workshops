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
    <livewire:show-news-page>
  </div>
</section>
@endsection