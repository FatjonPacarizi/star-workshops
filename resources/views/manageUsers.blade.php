@extends('layouts.app')
@section('content')
<div class="w-full h-full px-5 md:px-10 ">
  <livewire:filter-user />
  <div class="lg:w-full bg-white shadow-md rounded-xl  py-4 ">
    <h1 class="p-3 text-black  font-medium ml-2 ">Manage users</h1>
    <div id = "users" class="lg:w-full overflow-auto">
      <livewire:show-user />
    </div>
    <script>
    function toogleOverflow(x) {
      document.getElementById("users").classList.toggle("overflow-auto");
    }
    var x = window.matchMedia("(min-width: 1000px)");
    x.addListener(toogleOverflow); // Attach listener function on state changes
    if(window.innerWidth>1000){
      document.getElementById("users").classList.toggle("overflow-auto");
    }
    </script>
  </div>
  @endsection