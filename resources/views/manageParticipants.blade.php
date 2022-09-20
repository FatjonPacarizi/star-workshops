@php
$date = new DateTime("now", new DateTimeZone('Europe/Tirane') );

@endphp

@extends('layouts.app')
@section('content')
<div class="w-full h-screen px-10  ">

  @php
  $tab = 0;
  if(session()->has('tab')) {$tab = session('tab'); }
  else{
  if(request()->has('pendingParticipantsPage')) $tab = 1;
  else if(request()->has('notapprovedParticipantsPage')) $tab = 2;
  }
  @endphp

  <div x-data="{
              tab:{{$tab}},
              active : 'bg-white shadow',
              inactive: ' hover:shadow '
             }">

    <div class="w-full flex mt-5 items-center">
      <a href="{{ route('adminsuperadmin.showManageWorkshops') }}"><i class="fa-solid fa-arrow-left mr-5"></i></a>

      @php
      $pendingParticipantsTab = 1;
      $approvedParticipantsTab = 1;
      $notapprovedParticipantsTab = 1;

      if(request()->has('pendingParticipantsPage')) $pendingParticipantsTab = request('pendingParticipantsPage');
      if(request()->has('approvedParticipantsPage')) $approvedParticipantsTab = request('approvedParticipantsPage');
      if(request()->has('notapprovedParticipantsPage')) $notapprovedParticipantsTab =
      request('notapprovedParticipantsPage');

      @endphp


      <button onClick="changeURL('?approvedParticipantsPage={{$approvedParticipantsTab}}')"
        :class="tab === 0 ? active: inactive" class="px-5 h-8 ml-1 rounded-xl flex items-center"" @click="
        tab=0">Approved
        @if(count($approvedParticipants))
        <p class="w-4 h-4 text-xs flex justify-center items-center text-white ml-2 rounded-full bg-red-400">
          {{count($approvedParticipants)}}</p>
        @endif
      </button>
      <button onClick="changeURL('?pendingParticipantsPage={{$pendingParticipantsTab}}')"
        :class="tab === 1 ? active: inactive" class="px-5 h-8 ml-1 rounded-xl flex items-center" @click="tab = 1">
        Pending

        @if(count($pendingParticipants))
        <p class="w-4 h-4 text-xs flex justify-center items-center text-white ml-2 rounded-full bg-red-400">
          {{count($pendingParticipants)}}</p>
        @endif
      </button>
      <button onClick="changeURL('?notapprovedParticipantsPage={{$notapprovedParticipantsTab}}')"
        :class="tab === 2 ? active: inactive" class="px-5 h-8 ml-1 rounded-xl flex items-center"" @click=" tab=2">Not
        Approved
        @if(count($notapprovedParticipants))
        <p class="w-4 h-4 text-xs flex justify-center items-center text-white ml-2 rounded-full bg-red-400">
          {{count($notapprovedParticipants)}}</p>
        @endif
      </button>
    </div>
    <div class="w-full bg-white rounded-xl shadow-md py-4 mt-5">
      <h1 class="p-3 text-black font-medium ml-2 ">Workshop participants Managment</h1>

      <div x-show="tab === 1">
        <div class="flex items-center p-5 justify-between">
          <p class="text-left h-8 text-xl text-orange-400 w-2/4">Pending</p>
          <p class="w-1/2 font-bold text-end">{{$workshopName[0]->name}}</p>
        </div>
        <table class="w-full ">
          <tr class="text-gray-400 text-xs ">
            <td class="font-bold p-3 w-1/4">User Name</td>
            <td class="font-bold p-3 w-1/4">User Email</td>
            <td class="font-bold w-1/4">Applied On</td>
            <td class="font-bold  w-1/4">Actions</td>
          </tr>


          @foreach($pendingParticipants as $pendingParticipant)
          <tr class='border-t border-gray-200'>
            <td class="p-3 ">{{$pendingParticipant->user->name}}</td>
            <td class="p-3 ">{{$pendingParticipant->user->email}}</td>

            <td><a href="#" class="text-blue-600"> {{$pendingParticipant->created_at}}</a></td>
            <td class="flex items-center ">
              <a href="/workshopManage/{{$pendingParticipant->user->id}}/edit"
                class="bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                <i class="fa-solid fa-list fa-md "></i>
                Info
              </a>
              <form method="POST" action={{route('adminsuperadmin.approveParticipant',[$pendingParticipant->
                workshop_id,$pendingParticipant->user->id])}}>
                @csrf
                @method('PUT')
                <input type="hidden" name="tab" value="1" />
                <button class="bg-green-600  text-white px-3 py-2  text-xs rounded mr-3 hover:bg-green-700">
                  <i class="fa-solid fa-user-plus"></i>
                  Approve
                </button>
              </form>
              <form method="POST" action={{route('adminsuperadmin.declineParticipant',[$pendingParticipant->
                workshop_id,$pendingParticipant->user->id])}} ">
                @csrf
                @method('PUT')
                <input type="hidden" name="tab" value="1" />
                <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                  <i class="fa-solid fa-user-xmark mr-2"></i>
                  Decline
                </button>
              </form>

            </td>
          </tr>
          @endforeach
        </table>
        @if(count($pendingParticipants) == 1) <p class="w-full p-5 text-center"> No pending participant found</p> @endif
        <div class=" p-3">
          {{ $pendingParticipants->links() }}
        </div>
      </div>
      <div x-show="tab === 0">
        <div class="flex items-center p-5 justify-between">
          <p class="text-left h-8 text-xl text-green-400 w-2/4">Approved</p>
          <p class="w-1/2 font-bold text-end">{{$workshopName[0]->name}}</p>
        </div>
        <table class="w-full">
          <tr class="text-gray-400 text-xs">
            <td class="font-bold p-3 w-1/4">User Name</td>
            <td class="font-bold p-3 w-1/4">User Email</td>
            <td class="font-bold w-1/4">Applied On</td>
            <td class="font-bold  w-1/4">Actions</td>
          </tr>


          @foreach($approvedParticipants as $approvedParticipant)
          <tr class='border-t border-gray-200 '>
            <td class="p-3">{{$approvedParticipant->user->name}}</td>
            <td class="p-3 ">{{$approvedParticipant->user->email}}</td>
            <td><a href="#" class="text-blue-600"> {{$approvedParticipant->created_at}}</a></td>
            <td class="flex items-center">
              <a href="/workshopManage/{{$approvedParticipant->user->id}}/edit"
                class="bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                <i class="fa-solid fa-list fa-md "></i>
                Info
              </a>
              <form method="POST" action={{route('adminsuperadmin.declineParticipant',[$approvedParticipant->
                workshop_id,$approvedParticipant->user->id])}} ">
                @csrf
                @method('PUT')
                <input type="hidden" name="tab" value="0" />
                <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                  <i class="fa-solid fa-user-xmark mr-2"></i>
                  Remove
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
        @if(count($approvedParticipants) == 0) <p class="w-full p-5 text-center"> No approved participant found</p>
        @endif
        <div class="p-3">
          {{ $approvedParticipants->links() }}
        </div>
      </div>
      <div x-show="tab === 2">
        <div class="flex items-center p-5 justify-between">
          <p class="text-left h-8 text-xl text-red-400 w-2/4">Not Approved</p>
          <p class="w-1/2 font-bold text-end">{{$workshopName[0]->name}}</p>
        </div>
        <table class="w-full">
          <tr class="text-gray-400 text-xs">
            <td class="font-bold p-3 w-1/4">User Name</td>
            <td class="font-bold p-3 w-1/4">User Email</td>
            <td class="font-bold w-1/4">Applied On</td>
            <td class="font-bold w-1/4 ">Actions</td>
          </tr>


          @foreach($notapprovedParticipants as $notapprovedParticipant)
          <tr class='border-t border-gray-200 '>
            <td class="p-3">{{$notapprovedParticipant->user->name}}</td>
            <td class="p-3 ">{{$notapprovedParticipant->user->email}}</td>


            <td><a href="#" class="text-blue-600"> {{$notapprovedParticipant->created_at}}</a></td>
            <td class="flex items-center">
              <a href="/workshopManage/{{$notapprovedParticipant->user->id}}/edit"
                class="bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                <i class="fa-solid fa-list fa-md "></i>
                Info
              </a>
              <form method="POST" action={{route('adminsuperadmin.deleteParticipant',[$notapprovedParticipant->
                workshop_id,$notapprovedParticipant->user->id])}}>
                @csrf
                @method('DELETE')
                <input type="hidden" name="tab" value="2" />
                <button class="bg-red-400  text-white px-3 py-2  text-xs rounded mr-3 hover:bg-red-500">
                  <i class="fa-solid fa-lock-open"></i>
                  Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
        @if(count($notapprovedParticipants) == 0) <p class="w-full p-5 text-center"> No not approved participant found
        </p> @endif
        <div class="p-3">
          {{ $notapprovedParticipants->links() }}
        </div>
      </div>
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