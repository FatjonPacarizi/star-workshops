@php
$date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
@endphp
@extends('layouts.app')
@section('content')
<div class="w-full h-full px-6  flex flex-col  items-center ">
  {{-- {{dd(request()->has('pastsWorkshopsPage'))}} --}}
  @php
  $tab = 0;
  if(session()->has('tab')) {$tab = session('tab'); }
  else{
  if(request()->has('pastsWorkshopsPage')) $tab = 1;
  }
  @endphp
  <div class="w-full pb-4 relative" x-data="{
      tab:{{$tab}},
      active : 'bg-white shadow',
      inactive: ' hover:shadow '
     }">
    <div class="flex absolute top-3 left-5">
      @php
      $upcomingtab = 1;
      $pasttab = 1;
      if(request()->has('upcomingWorkshopsPage')) $upcomingtab = request('upcomingWorkshopsPage');
      if(request()->has('pastsWorkshopsPage')) $pasttab = request('pastsWorkshopsPage');
      @endphp
      <button onClick="changeURL('?upcomingWorkshopsPage={{$upcomingtab}}')" :class="tab === 0 ? active: inactive"
        class="px-5 h-8 flex items-center rounded-xl " @click="tab = 0">Upcoming</button>
      <button onClick="changeURL('?pastsWorkshopsPage={{$pasttab}}')" :class="tab === 1 ? active: inactive"
        class="px-5 h-8 ml-1 rounded-xl" @click="tab = 1 ">Pasts</button>
    </div>
    <div class="w-full">
      <div class="w-full px-5 pt-3" x-show="tab === 0">
        <div class = "flex justify-end ">
          <a href="{{route('adminsuperadmin.showInsert')}}" class = " bg-white w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 text-gray-400 hover:shadow  "><i class="fa-solid fa-plus font-thin text-2xl"></i></a>
          <livewire:filter-upcoming-workshops-manage>
        </div>
        <livewire:show-upcoming-workshops-manage />
      </div>
      <div class="w-full px-5 pt-3" x-show="tab === 1">
        <livewire:filter-past-workshops-manage>
          <livewire:show-past-workshops-manage />
      </div>
    </div>

  </div>


  @can('is_super_admin')
  <div class="w-full bg-white border border-gray-200 rounded pb-4 my-12">
    <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
      <h1 class="p-3 text-slate-900">Workshop Deleted
        <livewire:filtersafeworkshops />
      </h1>
    </div>
    <livewire:showsafeworkshops />
  </div>
</div>
@endcan
</div>

<script>
  function changeURL($param){
 if (history.pushState) {
      var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + $param;
      window.history.pushState({path:newurl},'',newurl);
  }
}
</script>
@endsection