@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left overflow-y-auto mb-10">
  <div class="w-full h-full p-6  flex flex-col  items-center ">

    <div class="w-full bg-white  rounded pb-4">
 
      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

        <h1 class="p-3 text-slate-900">News
          <livewire:filter-news/>
        </h1>
       
        <div class="flex mx-4 ">

          <a class="mx-2 flex items-center" href="http://127.0.0.1:8000/add-newspage">
            <h6 class="text-2xl mr-1 -mt-1 text-gray-400 ">+</h6>
            <h2 class="text-gray-400 ">Create news</h2>
          </a>
          
        </div>

      </div>

     
      @if (session('status'))
      <div class="w-full flex justify-center">{{ session('status') }}</div>
      @endif
      
      <livewire:show-news/>
    </div>
  </div>
  @endsection