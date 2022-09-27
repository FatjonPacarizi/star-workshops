@extends('layouts.landinglayouts')
@section('content')
@if($workshop_user[0]->application_status == 'approved' || $streaming->status == 'free')
<section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
    <div class="flex flex-wrap lg:mx-4 pt-12 pb-16 justify-center w-4/5">
        <div class="flex flex-col items-center mt-16">
            <h1 class="text-6xl font-bold text-red-500">{{$streaming->title}} </h1>

        <section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
            <div class="container mx-auto px-5 py-12  ">
                <div class="lg:flex-grow lg:px-24 md:px-4 md:items-start md:text-left ">
                    {!! $streaming->description !!}
                </div>
            </div>
        </section>
<iframe class="w-6/12 aspect-video ..." src="{{$streaming->url}}"></iframe>
</div>
</div>
<hr>
<div class="antialiased mx-auto max-w-screen-sm">
<div class="max-w-lg shadow-md mt-8">
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
  <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
  <div class="space-y-4">
  @foreach($comments as $comment)
    <div class="flex">
      <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{$comment->user->profile_photo_path ? asset('/storage/' . $comment->user->profile_photo_path) : asset('img/defaultuserphoto.png') }}" alt="">
      </div>
        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
        <strong>{{$comment->name}}</strong> <span class="text-xs text-gray-400">{{$comment->created_at->diffForHumans()}}</span>
        @if($comment->user_id == Auth::user()->id)
        <form method="POST" action="/comment/delete/{{$comment->id}}" class="inline flex justify-end">
              @csrf
              @method('DELETE')
              <button>
              <span class="text-xs text-gray-400 flex justify-end"><i class="fa-solid fa-trash-can text-red-400"></i></span>
              </button>
        </form>  
        @endif
        <p class="text-sm">{{$comment->comment}}</p>
      </div>  
    </div>@endforeach<br>
    {{$comments->links()}}
  </div>@endunless
</div>
</section>
@else
<section class="flex flex-wrap justify-center relative bg-[#f2f2f2]">
    <div class="flex flex-wrap lg:mx-4 p-12 mb-72 justify-center w-4/5">
        <div class="flex flex-col items-center mt-12">
            <h1 class="text-6xl font-bold text-red-500 mt-4"><i class="fa-solid fa-circle-play text-red-600"></i> {{$streaming->title}} </h1>
            <h1 class="text-6xl font-bold text-grey-500 mt-6 mb-12">Lecture content locked </h1>
            <p class="mb-4">If you're already enrolled,<a href="{{ route('login') }}" class="text-blue-700"> you'll need to login.</a></p>
            <h1> Get back to workshop: Apply to enroll this course </h1>
        </div>
    </div>
</section>
@endif
@endsection