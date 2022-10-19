@extends('layouts.app')
@section('content')
<div class="w-full h-full px-5 md:px-10 ">
  <livewire:filter-user />
  <div class="lg:w-full bg-white shadow-md rounded-xl  py-4 " >
    <h1 class="p-3 text-black  font-medium ml-2 ">Manage users</h1>
    <div class="lg:w-full overflow-x-auto">
    <livewire:show-user />
    </div>
  </div>
  @endsection