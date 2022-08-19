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
              

            @unless($workshops->isEmpty())
            @foreach($workshops as $workshop)
            <tr class = 'border-b border-gray-200'>
              <td class="p-3 ">{{$workshop->name}}</td>
              @php 
                 $upcoming = false;
                 if (strtotime($workshop->time) > strtotime($date->format("Y-m-d h:i:sa")))   $upcoming = true;
              @endphp
              <td class = "w-32" ><div class="w-8  @if($upcoming) bg-green-500 @else bg-red-500 @endif flex justify-center items-center rounded text-white text-sm">@if($upcoming) yes @else no @endif</div></td>

              <td ><a href="#" class = "text-blue-600"> {{$workshop->time}}</a></td>
              <td class = "flex items-center " >
                 <a href="/workshopManage/{{$workshop->id}}/edit" class="bg-sky-500 text-white px-2 py-1 text-sm rounded mr-3 my-2">
                  <i class="fa-solid fa-pen my-1 fa-sm"></i>
                      Edit
                  </a>
                <form method="POST" action="/workshopManage/{{$workshop->id}}">
                  @csrf
                  @method('DELETE')
                  <button class="bg-red-500 text-white px-2 py-1 text-sm rounded ">
                    <i class="fa-solid fa-trash-can  mr-1 my-1 fa-sm"></i>
                    Delete
                  </button>
                </form>
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
      </div>
      @endsection