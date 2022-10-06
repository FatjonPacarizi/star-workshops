@extends('layouts.app')
@section('content')
<div class="w-full h-full px-10 flex flex-col  items-center">
  <div class="w-full flex justify-between items-center">
    <a href="/streaminglive/insert/{{$workshops->id}}" class = " bg-white w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 text-gray-400 hover:shadow  "><i class="fa-solid fa-plus font-thin text-2xl"></i></a>
    <livewire:filter-streaming />
  </div>
  <div class="w-full bg-white shadow-md rounded-xl  py-4 " >
    <h1 class="p-3 text-black  font-medium ml-2 ">Manage Stream</h1>

    <livewire:show-streaming/>
</div>
@endsection
  {{-- box-shadow: rgba(149, 157, 165, 0.2) 0px 24px 30px; --}}
