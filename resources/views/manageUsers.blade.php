@extends('layouts.app')
@section('content')
<div class="w-full h-full px-10 ">
  <livewire:filter-user />
  <div class="lg:w-full w-[1000px] overflow-x-scroll bg-white shadow-md rounded-xl  py-4 " >
    <h1 class="p-3 text-black  font-medium ml-2 ">Manage users</h1>
    <livewire:show-user />
  </div>
  @endsection