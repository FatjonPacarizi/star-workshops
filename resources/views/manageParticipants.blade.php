@php
  $date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
  
@endphp

@extends('layouts.app')
  @section('content')
  <div class="w-full h-screen p-6  flex flex-col  items-center ">

    <div class="w-full bg-white  rounded pb-4 mt-12">

             <div  x-data="{
              tab:0,
              active : 'bg-gray-200  border-t border-l border-r rounded-t text-gray-900',
              inactive: 'text-gray-400 hover:text-gray-600 border-t  border-l border-r rounded-t'
             }">
              <div class="w-full flex justify-between border-b">
                <h1 class = "p-3 text-slate-900">Workshop participants Managment</h1>
                <div class="flex mr-10 items-end">
                <button :class = "tab === 0 ? active: inactive" class = "px-5 h-8 flex items-center" @click="tab = 0">
                  Pending 
                  @if(count($pendingParticipants)) 
                  <p class="w-4 h-4 text-xs flex justify-center items-center text-white ml-2 rounded-full bg-red-400">{{count($pendingParticipants)}}</p>
                  @endif
                </button>
                <button :class = "tab === 1 ? active: inactive" class = "px-5 h-8" @click="tab = 1">Approved</button>
                <button :class = "tab === 2 ? active: inactive" class = "px-5 h-8" @click="tab = 2">Not Approved</button>
              </div>
              </div>
              <div  x-show="tab === 0">
                <p class = "text-left h-8 m-5 text-xl text-orange-400">Pending</p>
                <table class="w-full ">
                  <tr class="border-y border-gray-200 ">
                    <td class="font-bold p-3 w-1/4">User Name</td>
                    <td class="font-bold p-3 w-1/4">User Email</td>
                    <td class="font-bold w-1/4">Applied On</td>
                    <td class="font-bold  w-1/4">Actions</td>
                  </tr>
                  
    
                @foreach($pendingParticipants as $pendingParticipant)
                <tr class = 'border-b border-gray-200'>
                  <td class="p-3 ">{{$pendingParticipant->name}}</td>
                  <td class="p-3 ">{{$pendingParticipant->email}}</td>
                 
                  <td ><a href="#" class = "text-blue-600"> {{$pendingParticipant->time}}</a></td>
                  <td class = "flex items-center " >
                     <a href="/workshopManage/{{$pendingParticipant->id}}/edit" class="bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                      <i class="fa-solid fa-list fa-md "></i>
                          Info
                      </a>
                      <form method="POST" action={{route('adminsuperadmin.approveParticipant',[$pendingParticipant->workshopID,$pendingParticipant->user_id])}}>
                        @csrf
                        @method('PUT')
                        <button class="bg-green-600  text-white px-3 py-2  text-xs rounded mr-3 hover:bg-green-700">
                          <i class="fa-solid fa-user-plus"></i>
                          Approve 
                        </button>
                      </form>
                      <form method="POST" action={{route('adminsuperadmin.declineParticipant',[$pendingParticipant->workshopID,$pendingParticipant->user_id])}} ">
                        @csrf
                        @method('PUT')
                        <button  class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                          <i class="fa-solid fa-user-xmark mr-2"></i>
                          Decline
                        </button>
                      </form>
                    
                  </td>
                </tr>
                @endforeach
                </table>
                @if(count($pendingParticipants) == 0) <p class = "w-full p-5 text-center"> No pending participant found</p> @endif
              </div>
              <div x-show="tab === 1">
                <p class = "text-left h-8 m-5 text-xl text-green-500">Approved</p>
                <table class="w-full">
                  <tr class="border-y border-gray-200 h-8 ">
                    <td class="font-bold p-3 w-1/4">User Name</td>
                    <td class="font-bold p-3 w-1/4">User Email</td>
                    <td class="font-bold w-1/4">Applied On</td>
                    <td class="font-bold  w-1/4">Actions</td>
                  </tr>
                  
            
                @foreach($approvedParticipants as $approvedParticipant)
                <tr class = 'border-b border-gray-200 '>
                  <td class="p-3">{{$approvedParticipant->name}}</td>
                  <td class="p-3 ">{{$approvedParticipant->email}}</td>
                  <td ><a href="#" class = "text-blue-600"> {{$approvedParticipant->time}}</a></td>
                  <td class = "flex items-center">
                    <a href="/workshopManage/{{$approvedParticipant->id}}/edit" class="bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                      <i class="fa-solid fa-list fa-md "></i>
                          Info
                      </a>
                    <form method="POST" action={{route('adminsuperadmin.declineParticipant',[$approvedParticipant->workshopID,$approvedParticipant->user_id])}} ">
                      @csrf
                      @method('PUT')
                      <button  class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                        <i class="fa-solid fa-user-xmark mr-2"></i>
                        Remove
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </table>
               @if(count($approvedParticipants) == 0) <p class = "w-full p-5 text-center"> No approved participant found</p> @endif
              </div>
              <div x-show="tab === 2">
                <p class = "text-left h-8 m-5 text-xl text-red-500">Not Approved</p>

                <table class="w-full">
                  <tr class="border-y border-gray-200 h-8 ">
                    <td class="font-bold p-3 w-1/4">User Name</td>
                    <td class="font-bold p-3 w-1/4">User Email</td>
                    <td class="font-bold w-1/4">Applied On</td>
                    <td class="font-bold w-1/4 ">Actions</td>
                  </tr>
                  
            
                @foreach($notapprovedParticipants as $notapprovedParticipant)
                <tr class = 'border-b border-gray-200 '>
                  <td class="p-3">{{$notapprovedParticipant->name}}</td>
                  <td class="p-3 ">{{$notapprovedParticipant->email}}</td>

                 
                  <td ><a href="#" class = "text-blue-600"> {{$notapprovedParticipant->time}}</a></td>
                  <td class = "flex items-center">
                    <a href="/workshopManage/{{$notapprovedParticipant->id}}/edit" class="bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                      <i class="fa-solid fa-list fa-md "></i>
                          Info
                      </a>
                      <form method="POST" action={{route('adminsuperadmin.deleteParticipant',[$notapprovedParticipant->workshopID,$notapprovedParticipant->user_id])}}>
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-400  text-white px-3 py-2  text-xs rounded mr-3 hover:bg-red-500">
                          <i class="fa-solid fa-lock-open"></i>
                          Delete 
                        </button>
                      </form>
                  </td>
                </tr>
                @endforeach
            </table>
            @if(count($notapprovedParticipants) == 0) <p class = "w-full p-5 text-center"> No not approved participant found</p> @endif

              </div>
         </div>
        </div>
      </div>
@endsection