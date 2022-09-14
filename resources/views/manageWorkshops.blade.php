@php
  $date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
@endphp
@extends('layouts.app')
  @section('content')
  <div class="w-full h-full p-6  flex flex-col  items-center ">
    {{-- {{dd(request()->has('pastsWorkshopsPage'))}} --}}
    @php  
      $tab = 0;
      if(session()->has('tab')) {$tab = session('tab'); }
      else{
         if(request()->has('pastsWorkshopsPage')) $tab = 1;
      }if(request()->has('deletedWorkshopsPage')) $tab = 2;    
    @endphp
    <div class="w-full bg-white rounded pb-4 " x-data="{
      tab:{{$tab}},
      active : 'bg-gray-100  rounded-t text-gray-900 border-b-2 border-sky-700',
      inactive: 'text-gray-400 hover:text-gray-600 border-t  border-l border-r rounded-t'
     }">
     <div class="w-full flex justify-between border-b">
      <h1 class = "p-3 text-slate-900">Workshop Managment</h1>
     <div class="flex items-end">
      <div class="flex">
        <div class="flex">
          @php  
          $upcomingtab = 1;
          $pasttab = 1;
          $deleted = 1;
          if(request()->has('upcomingWorkshopsPage')) $upcomingtab = request('upcomingWorkshopsPage');
          if(request()->has('pastsWorkshopsPage')) $pasttab = request('pastsWorkshopsPage');
          if(request()->has('deletedWorkshopsPage')) $deleted = request('deletedWorkshopsPage');
        @endphp
        <button  onClick = "changeURL('?upcomingWorkshopsPage={{$upcomingtab}}')" :class = "tab === 0 ? active: inactive" class = "px-5 h-8 flex items-center" @click="tab = 0">Upcoming</button>
        <button  onClick = "changeURL('?pastsWorkshopsPage={{$pasttab}}')"  :class = "tab === 1 ? active: inactive" class = "px-5 h-8" @click="tab = 1 ">Pasts</button>
        @can('is_super_admin')
        <button  onClick = "changeURL('?deletedWorkshopsPage={{$deleted}}')" :class = "tab === 2 ? active: inactive" class = "px-5 h-8" @click="tab = 2 ">Deleted</button>
        @endcan
        </div>   
      </div>
      <a class="mx-5 mb-1 flex items-center" href="{{route('adminsuperadmin.showInsert')}}">
        <h6 class = "text-2xl mr-1 -mt-1 text-gray-400 ">+</h6>
        <h2 class = "text-gray-400 ">Create Workshop</h2>   
      </a>
     </div>
     </div>
     
      <div class="w-full px-5 pt-5"  x-show="tab === 0">
        <livewire:filter-upcomings-workshops>
        <livewire:show-upcomings-workshops/>
      </div>

      <div class="w-full px-5 pt-5"  x-show="tab === 1">
        <livewire:filter-pasts-workshops>
        <livewire:show-pasts-workshops/>
      </div>

       @can('is_super_admin')
      <div class="w-full px-5 pt-5" x-show="tab === 2">
        <livewire:filtersafeworkshops/>
        <livewire:showsafeworkshops/>
      </div>
       @endcan
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