@extends('layouts.app')
  @section('content')
  <div class="w-full h-full p-6  flex flex-col  items-center">
 
    <div class="w-full bg-white  rounded pb-4 ">

            <h1 class = "p-3 text-slate-900 border-b border-gray-200 mb-4 ">User Managment
              <livewire:filter-user/>
            </h1>

            <livewire:show-user/>

  
      </div>
      @endsection