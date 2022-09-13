@extends('layouts.app')
@section('content')
<div class="w-full h-full px-10 flex flex-col  items-center">
  <livewire:filter-user />
  <div class="w-full bg-white  rounded-xl shadow-md  py-4 ">

    <h1 class="p-3 text-black font-medium ml-2 ">Manage users</h1>

    <livewire:show-user />

  </div>
  @endsection