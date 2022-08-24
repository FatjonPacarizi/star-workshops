@php
  $date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
  
@endphp

@extends('layouts.app')
  @section('content')
  <div class="w-full h-full p-6  flex flex-col  items-center ">

    <div class="w-full bg-white border border-gray-200 rounded pb-4 mt-12">

      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

        <h1 class = "p-3 text-slate-900">Workshop Managment</h1>

          <div class="flex mx-4 ">
            
            <a class="mx-2 flex items-center" href="{{route('adminsuperadmin.showInsert')}}">
              <h6 class = "text-2xl mr-1 -mt-1 text-gray-400 ">+</h6>
              <h2 class = "text-gray-400 ">Create Workshop</h2>
              
            </a>
          </div>
        
      </div>


             <div class="w-full flex justify-center">
            <table class="w-full mx-4  font-thin">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3 ">Workshop Name</td>
                <td class="font-bold">Upcoming</td>
                <td class="font-bold">Workshop time</td>
                <td class="font-bold  ">Actions</td>
              </tr>
              

            @unless(count($workshops) == 0)
            @foreach($workshops as $workshop)
            <tr class = 'border-b border-gray-200'>
              <td class="p-3 ">{{$workshop->name}}</td>
              @php 
                 $upcoming = false;
                 if (strtotime($workshop->time) > strtotime($date->format("Y-m-d h:i:sa")))   $upcoming = true;
              @endphp
              <td class = "w-32" ><div class="w-6  flex justify-center items-start rounded text-white text-xs  @if($upcoming) bg-green-500 @else bg-red-500 @endif ">@if($upcoming) yes @else no @endif</div></td>

              <td ><a href="#" class = "text-blue-600"> {{\Carbon\Carbon::parse($workshop->time)->format('d F Y h:m') }}</a></td>
              <td class = "flex items-center " >
                
                 <a href="/workshopManage/{{$workshop->id}}/{{$workshop->limited_participants ? $workshop->limited_participants : 'null'}}/edit" class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                  <i class="fa-solid fa-pen fa-md"></i>
                      Edit
                  </a>
                <form method="POST" action="/workshopManage/{{$workshop->id}}">
                  @csrf
                  @method('DELETE')
                  <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                    <i class="fa-solid fa-trash-can  fa-md"></i>
                    Delete
                  </button>
                </form>
                <a href={{ route('adminsuperadmin.showParticipants',$workshop->id)}} class="w-28 bg-sky-600 text-white p-2 pr-0 text-xs rounded flex items-center  my-2 hover:bg-sky-700">
                  <i class="fa-solid fa-user fa-md"></i>
                  <p class = "mx-1">Participants</p> 
                  @if($workshop->pendingParticipants > 0)
                  <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-red-400">{{$workshop->pendingParticipants}}</p>
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
                <td class="font-bold  ">Actions</td>
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
  </div>
        </div>
        
      </div>
      @endcan
</div>
      @endsection