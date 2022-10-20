@extends('asideStreaming')
@section('content')
@if($streaming->status == 'free' || $streaming1)
<div class="flex items-center p-2 px-5 md:px-2 space-x-4 border md:justify-self-end justify-between">
  <h1 class="text-center md:hidden"><a href="/workshop/{{$workshops->id}}"><i class="fa-solid fa-square-caret-left text-red-500"></i>  {{$streaming->workshop->name}}</a></h1>
	<h3 class="text-lg font-semibold mx-5">Clicks:   {{$streaming->count}}</h3>
</div>
<section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
    <div class="flex flex-wrap lg:mx-4 pb-10 justify-center w-4/5">
        <div class="flex flex-col items-center mt-16">
            <h1 class="text-3xl md:text-5xl font-bold text-red-500">{{$streaming->title}} </h1>
        </div>
    </div>
</section>
<section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
    <div class="container mx-auto px-5 py-2  ">
        <div class="lg:flex-grow lg:px-24 md:px-4 md:items-start md:text-left ">
             {!! $streaming->description !!}
        </div>
    </div>
</section>
<section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
    <div class="flex flex-wrap lg:mx-4 pt-12 md:pb-16 justify-center w-full md:w-4/5">
      @if($streaming->url != '')
      <iframe class=  "w-full h-96 md:w-2/3" src="{{$streaming->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      @endif
    </div>
</section>
<div class="w-full md:hidden bg-gray-200">
  <div class="bg-gray-200 pt-4 pb-4"> 
    <div class="h-fit pl-4 pt-2 pb-2">
      Introduction
    </div>
    <ul class="w-full"> 
      @foreach($streamings as $str)
      @if($str->status == 'free') 
      <a  href="/workshop/{{$workshops->id}}/streaming/{{$str->id}}">
      <li class="h-fit {{Request::segment(4) == $str->id ? 'bg-gray-300 font-medium' : ''}} p-4  ">   
            <span class="">@if($str->url != '')<i class="fa-solid fa-tv"></i>@else<i class="fa-solid fa-align-left"></i>@endif
             {{$str->title}} 
            </span>
          </li>
        </a>
      @endif
      @endforeach
    </ul>
  </div>
  <div class="bg-gray-200 pb-4"> 
    <div class="h-fit pl-4 pt-2 pb-2">
      Advance Course
    </div>
    <ul class="w-full">
    @foreach($streamings as $str)
      @if($str->status == 'paid')   
      <a  href="/workshop/{{$workshops->id}}/streaming/{{$str->id}}">
      <li class="h-fit p-4  {{Request::segment(4) == $str->id ? 'bg-gray-300 font-medium' : ''}}">
            <span>@if($str->url != '')<i class="fa-solid fa-tv"></i>@else<i class="fa-solid fa-align-left"></i>@endif
            {{$str->title}}
            </span>
          </li>
        </a>
      @endif
      @endforeach
    </ul> 
  </div>
</div>

<hr>

<div class="antialiased mx-auto flex flex-col items-center">
<div class=" w-full lg:w-1/2 mt-8">
  <div class="shadow-md">
  <form action="/comment-add" id="comment-form" method="POST" class="w-full p-4">
    @csrf
    <input type="hidden" name="streaming_id" value="{{$streaming->id}}" >
    <input type="hidden" name="user_id" value="{{Auth::user()}}" >
    <div class="mb-2">
      <label for="comment" class="text-lg text-gray-600">Add a comment</label>
      <textarea class="w-full h-20 p-2 border rounded focus:outline-none focus:ring-gray-300 focus:ring-1"
        name="comment" placeholder=""></textarea>
    </div>
    <button class="px-3 py-2 text-sm text-blue-100 bg-blue-600 rounded">Comment</button>
  </form>
</div>
  @unless(count($comments) == 0)
  <h3 class="mb-4 text-lg font-semibold text-gray-900 ml-5 mt-4">{{$comments->count()}} comments</h3>
  <div class="space-y-4 mx-5">
  @foreach($comments as $comment)
    <div class="flex">
      <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{$comment->user->profile_photo_path ? asset('/storage/' . $comment->user->profile_photo_path) : asset('img/defaultuserphoto.png') }}" alt="">
      </div>
        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
        <strong>{{$comment->name}}</strong> <span class="text-xs text-gray-400">{{$comment->created_at->diffForHumans()}}</span>
       @if(Auth::check())
        @if($comment->user_id == Auth::user()->id || Auth::user()->user_status == 'superadmin')
        <form method="POST" action="/comment/delete/{{$comment->id}}" class="inline flex justify-end">
              @csrf
              @method('DELETE')
              <button>
              <span class="text-xs text-gray-400 flex justify-end"><i class="fa-solid fa-trash-can text-red-400"></i></span>
              </button>
        </form>
        @endif
        @endif
        <p class="text-sm">{{$comment->comment}}</p>
      </div>
    </div>@endforeach<br>
    {{$comments->links()}}
  </div>@endunless
</div>
</div>
</section>
@else
<section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
    <div class="flex flex-wrap lg:mx-4 p-12 mb-72 justify-center w-4/5">
        <div class="flex flex-col items-center mt-12">
            <h1 class="text-5xl font-bold text-red-500 mt-4"><i class="fa-solid fa-circle-play text-red-600"></i> {{$streaming->title}} </h1>
            <h1 class="text-4xl font-bold text-grey-500 mt-6 mb-10">   Lecture content locked </h1>
            <p class="mb-2">If you're already enrolled,<a href="{{ route('login') }}" class="text-blue-700"> you'll need to login.</a></p>
            <h1> Get back to workshop: <a href="/workshop/{{$workshops->id}}"><b>Apply to enroll this course</b></a></h1>
        </div>
    </div>
</section>
@endif
@endsection
