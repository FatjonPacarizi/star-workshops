@php
$date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
@endphp
@extends('layouts.app')
@section('content')
<div class="w-full h-full px-5  flex flex-col  items-center ">
  @php
  $tab = 0;
  if(request()->has('ongoingWorkshopsPage')) $tab = 1;
  if(request()->has('pastsWorkshopsPage')) $tab = 2;
  if(request()->has('deletedWorkshopsPage')) $tab = 3;
  @endphp
  <div class="w-full pb-4 relative" x-data="{
      tab:{{$tab}},
      active : 'bg-white shadow',
      inactive: ' hover:shadow '
     }">
    <div class="w-fit mx-auto flex border border-gray-200 rounded-xl bg-gray-100  xl:absolute top-3 left-1/2 md:left-5">
      @php
      $upcomingtab = 1;
      $ongoingtab = 1;
      $pasttab = 1;
      $deleted = 1;
      if(request()->has('upcomingWorkshopsPage')) $upcomingtab = request('upcomingWorkshopsPage');
      if(request()->has('ongoingWorkshopsPage')) $ongoingtab = request('ongoingWorkshopsPage');
      if(request()->has('pastsWorkshopsPage')) $pasttab = request('pastsWorkshopsPage');
      if(request()->has('deletedWorkshopsPage')) $deleted = request('deletedWorkshopsPage');
      @endphp
      <button onClick="changeURL('?upcomingWorkshopsPage={{$upcomingtab}}')" :class="tab === 0 ? active: inactive" class="px-3 md:px-7 h-8 flex items-center text-xs rounded-xl " @click="tab = 0">UPCOMING</button>
      <button onClick="changeURL('?ongoingWorkshopsPage={{$ongoingtab}}')" :class="tab === 1 ? active: inactive" class="px-3 md:px-7 h-8 flex items-center text-xs ml-1 rounded-xl " @click="tab = 1">ONGOING</button>
      <button onClick="changeURL('?pastsWorkshopsPage={{$pasttab}}')" :class="tab === 2 ? active: inactive" class="px-3 md:px-7 h-8 ml-1 text-xs rounded-xl" @click="tab = 2 ">PASTS</button>
      @can('is_super_admin')
      <button  onClick = "changeURL('?deletedWorkshopsPage={{$deleted}}')" :class = "tab === 3 ? active: inactive"  class="px-3 md:px-7 h-8 ml-1 rounded-xl text-xs"  @click="tab = 3 ">DELETED</button>
      @endcan
    </div>
    <div class="w-full">
      <div class="w-full md:px-5 pt-3 " x-show="tab === 0">
        <div class = "flex xl:justify-end justify-between">
          <a href="{{route('adminsuperadmin.showInsert')}}" class = " bg-white w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 text-gray-400 hover:shadow mr-2 "><i class="fa-solid fa-plus font-thin text-2xl"></i></a>
          <livewire:filter-upcoming-workshops-manage>
        </div>
        <div id = "upcoming" class="lg:w-full shadow-md bg-white rounded-xl overflow-auto">
          <livewire:show-upcoming-workshops-manage />
        </div>
      </div>
      <div class="w-full md:px-5 pt-3" x-show="tab === 1">
        <div class = "flex xl:justify-end justify-between">
          <a href="{{route('adminsuperadmin.showInsert')}}" class = " bg-white w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 text-gray-400 hover:shadow mr-2 "><i class="fa-solid fa-plus font-thin text-2xl"></i></a>
          <livewire:filter-ongoing-workshops-manage>
        </div>
        <div id = "ongoing" class="lg:w-full shadow-md bg-white rounded-xl overflow-auto">
        <livewire:show-ongoing-workshops-manage />
        </div>
      </div>
      <div class="w-full md:px-5 pt-3" x-show="tab === 2">
        <livewire:filter-past-workshops-manage>
          <div id = "pasts" class="lg:w-full shadow-md bg-white rounded-xl overflow-auto">
          <livewire:show-past-workshops-manage />
          </div>
      </div>

      @can('is_super_admin')
      <div class="w-full md:px-5 pt-3" x-show="tab === 3">
        <livewire:filtersafeworkshops/>
        <div id = "deleted" class="lg:w-full shadow-md bg-white rounded-xl overflow-auto">
        <livewire:showsafeworkshops/>
        </div>
      </div>
       @endcan
    </div>
  </div>
</div>

<script>
  function changeURL($param){
 if (history.pushState) {
      var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + $param;
      window.history.pushState({path:newurl},'',newurl);
  }
}
function toogleOverflow(x) {
    document.getElementById("upcoming").classList.toggle("overflow-auto");
    document.getElementById("pasts").classList.toggle("overflow-auto");
    document.getElementById("ongoing").classList.toggle("overflow-auto");
    document.getElementById("deleted").classList.toggle("overflow-auto");
}
var x = window.matchMedia("(min-width: 1000px)");
x.addListener(toogleOverflow); // Attach listener function on state changes
if(window.innerWidth>1000){
 document.getElementById("upcoming").classList.toggle("overflow-auto");
 document.getElementById("pasts").classList.toggle("overflow-auto");
 document.getElementById("ongoing").classList.toggle("overflow-auto");
 document.getElementById("deleted").classList.toggle("overflow-auto");
}
</script>
@endsection