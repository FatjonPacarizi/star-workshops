@extends('layouts.app')
@section('content')
<div class="w-full  p-6 px-10 flex ">
  <div class="w-full bg-white   shadow-md rounded-xl  ">
    <div class="w-full flex items-center  border-b border-gray-200 mb-4">
      <a href="/faq"><i class="fa-solid fa-arrow-left mx-4"></i></a>
      <h1 class="p-3 text-black  font-medium  ">User Faq</h1>
    </div>
    <form method="POST" action="/update/{{$faq->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Question</label>
        <input type="text" class="border border-gray-200 rounded p-1 w-full mx-5" placeholder="Question" name="question"
          value="{{$faq->question}}" />
        @error('question')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6  flex items-center sm:items-center">
        <label class="w-28 text-sm mx-5">Answer</label>
        <input type="text" class="border border-gray-200 rounded p-1 w-full mx-5" name="answer" placeholder="Answer"
          value="{{$faq->answer}}" />
        @error('answer')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="w-full p-4 flex justify-end border-t border-gray-200">
        <button class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Update QA</button>
      </div>
    </form>
  </div>

</div>
@endsection