@php
$date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
@endphp
@extends('layouts.app')
@section('content')
<div class="w-full h-full px-5  flex flex-col  items-center ">
  @php
  $tab = 0;
  if(session()->has('tab')) {$tab = session('tab'); }
  else{
  if(request()->has('pastsWorkshopsPage')) $tab = 1;
  } if(request()->has('deletedWorkshopsPage')) $tab = 2;
  @endphp
  <div class="w-full pb-4 relative" x-data="{
      tab:{{$tab}},
      active : 'bg-white shadow',
      inactive: ' hover:shadow '
     }">
    <div class="flex absolute top-3 left-5">
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
      <button onClick="changeURL('?upcomingWorkshopsPage={{$upcomingtab}}')" :class="tab === 0 ? active: inactive"
        class="px-5 h-8 flex items-center rounded-xl " @click="tab = 0">Upcoming</button>
      <button onClick="changeURL('?ongoingWorkshopsPage={{$ongoingtab}}')" :class="tab === 1 ? active: inactive"
        class="px-5 h-8 flex items-center ml-1 rounded-xl " @click="tab = 1">Ongoing</button>
      <button onClick="changeURL('?pastsWorkshopsPage={{$pasttab}}')" :class="tab === 2 ? active: inactive"
        class="px-5 h-8 ml-1 rounded-xl" @click="tab = 2 ">Pasts</button>
      @can('is_super_admin')
      <button  onClick = "changeURL('?deletedWorkshopsPage={{$deleted}}')" :class = "tab === 3 ? active: inactive"  class="px-5 h-8 ml-1 rounded-xl"  @click="tab = 3 ">Deleted</button>
      @endcan
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
        <div class = "flex justify-end ">
          <a href="{{route('adminsuperadmin.showInsert')}}" class = " bg-white w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 text-gray-400 hover:shadow  "><i class="fa-solid fa-plus font-thin text-2xl"></i></a>
          <livewire:filter-ongoing-workshops-manage>
        </div>
        <livewire:show-ongoing-workshops-manage />
      </div>
      <div class="w-full px-5 pt-3" x-show="tab === 2">
        <livewire:filter-past-workshops-manage>
          <livewire:show-past-workshops-manage />
      </div>

      @can('is_super_admin')
      <div class="w-full px-5 pt-3" x-show="tab === 3">
        <livewire:filtersafeworkshops/>
        <livewire:showsafeworkshops/>
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
</script>
@endsection