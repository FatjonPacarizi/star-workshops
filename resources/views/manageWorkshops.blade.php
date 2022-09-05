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
      }
      
    @endphp


    <div class="w-full bg-white rounded pb-4 " x-data="{
      tab:{{$tab}},
      active : 'bg-gray-100  rounded-t text-gray-900 border-b-2 border-sky-700',
      inactive: 'text-gray-400 hover:text-gray-600 border-t  border-l border-r rounded-t'
     }">
     <div class="w-full flex justify-between">
      <h1 class = "p-3 text-slate-900">Workshop Managment</h1>
      <a class="mx-5 flex items-center" href="{{route('adminsuperadmin.showInsert')}}">
        <h6 class = "text-2xl mr-1 -mt-1 text-gray-400 ">+</h6>
        <h2 class = "text-gray-400 ">Create Workshop</h2>
        
      </a>
     </div>

      <div class="w-full  flex justify-between items-stretch border-b border-gray-200 mb-4">
        <div class="mx-5">
        <livewire:filter-workshops/>

        </div>

          <div class="flex mx-4 self-end">
            <div class="flex mr-10 ">
              @php  
              $upcomingtab = 1;
              $pasttab = 1;

              if(request()->has('upcomingWorkshopsPage')) $upcomingtab = request('upcomingWorkshopsPage');
              if(request()->has('pastsWorkshopsPage')) $pasttab = request('pastsWorkshopsPage');

            @endphp
              <button  onClick = "changeURL('?upcomingWorkshopsPage={{$upcomingtab}}')" :class = "tab === 0 ? active: inactive" class = "px-5 h-8 flex items-center" @click="tab = 0">Upcoming</button>
              <button  onClick = "changeURL('?pastsWorkshopsPage={{$pasttab}}')"  :class = "tab === 1 ? active: inactive" class = "px-5 h-8" @click="tab = 1 ">Pasts</button>
            </div>
            
          </div>
        
      </div>


      <div class="w-full px-5"  x-show="tab === 0">

            <livewire:show-workshops/>

      </div>

  <div class="w-full px-5"  x-show="tab === 1">
    {{-- <table class="w-full mx-auto ">
      <tr class="border-y border-gray-200 font-bold">
          <td class=" p-3 w-1/3">Workshop Name</td>
          <td class=" text-sm">Limited Participants</td>
          <td>Workshop time</td>
          <td class = " w-24 text-sm">Workshop Image</td>
          <td class=" w-72 ">Actions</td>
      </tr>
      

    @unless(count($pastsWorkshops) == 0)
    @foreach($pastsWorkshops as $pastWorkshop)
    <tr class = 'border-b border-gray-200'>
      <td class="p-3 ">{{ \Illuminate\Support\Str::limit($pastWorkshop->name, 45, $end='...') }}</td>
      @php 
      $limited_participants = true;
      if (!$pastWorkshop->limited_participants)   $limited_participants = false;
      @endphp
      <td class = "w-32" ><div class="w-6  flex justify-center items-start rounded text-white text-xs  @if($limited_participants) bg-orange-500 @else bg-green-500 @endif ">@if($limited_participants) {{$pastWorkshop->limited_participants}} @else no @endif</div></td>
      <td ><a href="#" class = "text-blue-600"> {{\Carbon\Carbon::parse($pastWorkshop->time)->format('d F Y h:m') }}</a></td>
      <td><img class="object-cover rounded" alt="hero" src="{{$pastWorkshop->img_workshop ? asset('/storage/' . $pastWorkshop->img_workshop) : asset('/img/test.jpg')}}" width="50"></td>
      <td class = "flex items-center " >
         <a href="/workshopManage/{{$pastWorkshop->id}}/{{$pastWorkshop->limited_participants ? $pastWorkshop->limited_participants : 'null'}}/edit" class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
          <i class="fa-solid fa-pen fa-md"></i>
              Edit
          </a>
        <form method="POST" action="/workshopManage/{{$pastWorkshop->id}}">
          @csrf
          @method('DELETE')
          <input type = "hidden" name = "tab" value = "1"/>
          <button @if(count($pastsWorkshops)==1)  onClick = "changeURL('?pastsWorkshopsPage=1')"  @endif class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
            <i class="fa-solid fa-trash-can  fa-md"></i>
            Delete
          </button>
        </form>
        <a href={{ route('adminsuperadmin.showParticipants',$pastWorkshop->id)}} class="w-28 bg-sky-600 text-white p-2 pr-0 text-xs rounded flex items-center  my-2 hover:bg-sky-700">
          <i class="fa-solid fa-user fa-md"></i>
          <p class = "mx-1">Participants</p> 
          @if($pastWorkshop->pendingParticipants > 0)
          <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-red-400">{{$pastWorkshop->pendingParticipants}}</p>
          @endif  
        </a>
        
      </td>
    </tr>
    @endforeach
    @else
    <tr>
      <td ></td>
      <td class = "p-5">
        No workshops Found
      </td>
    </tr>
    @endunless
</table>

<div class=" p-3">{{ $pastsWorkshops->links() }}</div> --}}
</div>
</div>
       

        {{-- @can('is_super_admin')
         <div class="w-full bg-white border border-gray-200 rounded pb-4 my-12">
      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
        <h1 class = "p-3 text-slate-900">Workshop Deleted </h1>
      </div>


             <div class="w-full flex justify-center">
            <table class="w-full mx-4  font-thin">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3 w-1/2">Workshop Name</td>
                <td class="font-bold">Workshop deleted</td>
                <td class="font-bold">Author</td>
                <td class="font-bold w-72 ">Actions</td>
              </tr>
            
            @foreach($workshops1 as $workshop1)
            <tr class = 'border-b border-gray-200'>
              <td class="p-3 ">{{ \Illuminate\Support\Str::limit($workshop1->name, 50, $end='...') }}</td>
              <td class="text-blue-600">{{\Carbon\Carbon::parse($workshop1->deleted_at)->format('d F Y h:m') }}</td>
              <td class="text-blue-600">{{$workshop1->author}}</td>
              <td class = "flex items-center " >
                <form method="POST" action="/workshopManage/{{$workshop1->id}}/restore">
                @csrf
                
                 
              <button class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-blue-500 opacity-1">
              <i class="fa-solid fa-trash-can-arrow-up"></i>
                      Restore
                    </button>
                  </form>
                <form method="POST" action="/forcedelete/{{$workshop1->id}}">
                  @csrf
                  @method('DELETE')
                  <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                    <i class="fa-solid fa-trash-can  fa-md"></i>
                    Force Delete
                  </button>
                </form>
              </td>
              
            </tr>
            @endforeach
    </table>
  </div><div class="flex justfy-center p-3"
                            {{ $workshops1->links() }}
                  </div>
        </div>
        
      </div>
      @endcan --}}
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