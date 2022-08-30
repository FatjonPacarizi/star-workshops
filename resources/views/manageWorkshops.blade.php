@php
  $date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
  
@endphp

@extends('layouts.app')
  @section('content')
  <div class="w-full h-full p-6  flex flex-col  items-center ">
    {{-- {{dd(request()->has('pastsWorkshopsPage'))}} --}}
    @php  
      $tab = 0;
      if(session()->has('tab')) $tab = session('tab');
      else{
         if(request()->has('pastsWorkshopsPage')) $tab = 1;
      }
    @endphp


    <div class="w-full bg-white border border-gray-200 rounded pb-4 mt-12" x-data="{
      tab:{{$tab}},
      active : 'bg-gray-200  border-t border-l border-r rounded-t text-gray-900',
      inactive: 'text-gray-400 hover:text-gray-600 border-t  border-l border-r rounded-t'
     }">

      <div class="w-full flex justify-between items-stretch border-b border-gray-200 mb-4">

        <h1 class = "p-3 text-slate-900">Workshop Managment</h1>

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
            <a class="mx-2 flex items-center" href="{{route('adminsuperadmin.showInsert')}}">
              <h6 class = "text-2xl mr-1 -mt-1 text-gray-400 ">+</h6>
              <h2 class = "text-gray-400 ">Create Workshop</h2>
              
            </a>
          </div>
        
      </div>


             <div class="w-full"  x-show="tab === 0">

            

            <table class="w-full mx-auto  font-thin">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3 w-2/5">Workshop Name</td>
                <td class="font-bold text-sm">Limited Participants</td>
                <td class="font-bold">Workshop time</td>
                <td class="font-bold w-72 ">Actions</td>
              </tr>
              
            @unless(count($upcomingWorkshops) == 0)
            @foreach($upcomingWorkshops as $upcomingWorkshop)
            <tr class = 'border-b border-gray-200'>
              <td class="p-3 ">{{ \Illuminate\Support\Str::limit($upcomingWorkshop->name, 60, $end='...') }}</td>
              @php 
                 $limited_participants = true;
                 if (!$upcomingWorkshop->limited_participants)   $limited_participants = false;
              @endphp
              <td class = "w-32" ><div class="w-6  flex justify-center items-start rounded text-white text-xs  @if($limited_participants) bg-orange-500 @else bg-green-500 @endif ">@if($limited_participants) {{$upcomingWorkshop->limited_participants}} @else no @endif</div></td>

              <td ><a href="#" class = "text-blue-600"> {{\Carbon\Carbon::parse($upcomingWorkshop->time)->format('d F Y h:m') }}</a></td>
              <td class = "flex items-center " >
                
                 <a href="/workshopManage/{{$upcomingWorkshop->id}}/{{$upcomingWorkshop->limited_participants ? $upcomingWorkshop->limited_participants : 'null'}}/edit" class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                  <i class="fa-solid fa-pen fa-md"></i>
                      Edit
                  </a>
                <form method="POST" action="/workshopManage/{{$upcomingWorkshop->id}}">
                  @csrf
                  @method('DELETE')
                  <input type = "hidden" name = "tab" value = "0"/>
                  <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                    <i class="fa-solid fa-trash-can  fa-md"></i>
                    Delete
                  </button>
                </form>
                <a href={{ route('adminsuperadmin.showParticipants',$upcomingWorkshop->id)}} class="w-28 bg-sky-600 text-white p-2 pr-0 text-xs rounded flex items-center  my-2 hover:bg-sky-700">
                  <i class="fa-solid fa-user fa-md"></i>
                  <p class = "mx-1">Participants</p> 
                  @if($upcomingWorkshop->pendingParticipants > 0)
                  <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-red-400">{{$upcomingWorkshop->pendingParticipants}}</p>
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
    <div class=" p-3">{{ $upcomingWorkshops->links() }}</div>

  </div>

  <div class="w-full"  x-show="tab === 1">
    <table class="w-full mx-auto  font-thin">
      <tr class="border-y border-gray-200 ">
        <td class="font-bold p-3 w-2/5">Workshop Name pasts</td>
        <td class="font-bold text-sm">Limited Participants</td>
        <td class="font-bold">Workshop time</td>
        <td class="font-bold w-72 ">Actions</td>
      </tr>
      

    @unless(count($pastsWorkshops) == 0)
    @foreach($pastsWorkshops as $pastWorkshop)
    <tr class = 'border-b border-gray-200'>
      <td class="p-3 ">{{ \Illuminate\Support\Str::limit($pastWorkshop->name, 50, $end='...') }}</td>
      @php 
      $limited_participants = true;
      if (!$pastWorkshop->limited_participants)   $limited_participants = false;
      @endphp
      <td class = "w-32" ><div class="w-6  flex justify-center items-start rounded text-white text-xs  @if($limited_participants) bg-orange-500 @else bg-green-500 @endif ">@if($limited_participants) {{$pastWorkshop->limited_participants}} @else no @endif</div></td>
      <td ><a href="#" class = "text-blue-600"> {{\Carbon\Carbon::parse($pastWorkshop->time)->format('d F Y h:m') }}</a></td>
      <td class = "flex items-center " >
        
         <a href="/workshopManage/{{$pastWorkshop->id}}/{{$pastWorkshop->limited_participants ? $pastWorkshop->limited_participants : 'null'}}/edit" class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
          <i class="fa-solid fa-pen fa-md"></i>
              Edit
          </a>
        <form method="POST" action="/workshopManage/{{$pastWorkshop->id}}">
          @csrf
          @method('DELETE')
          <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
            <input type = "hidden" name = "tab" value = "1"/>
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

<div class=" p-3">{{ $pastsWorkshops->links() }}</div>
</div>
</div>
       

        @can('is_super_admin')
         <div class="w-full bg-white border border-gray-200 rounded pb-4 my-12">
      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
        <h1 class = "p-3 text-slate-900">Workshop Deleted </h1>
      </div>


             <div class="w-full flex justify-center">
            <table class="w-full mx-4  font-thin">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3 ">Workshop Name</td>
                <td class="font-bold">Workshop deleted</td>
                <td class="font-bold">Author</td>
                <td class="font-bold w-72 ">Actions</td>
              </tr>
            
            @foreach($workshops1 as $workshop1)
            <tr class = 'border-b border-gray-200'>
              <td class="p-3 ">{{$workshop1->name}}</td>
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