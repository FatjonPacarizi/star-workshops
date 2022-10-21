@php
$date = new DateTime("now", new DateTimeZone('Europe/Tirane') );

@endphp

@extends('layouts.app')
@section('content')
<div class="w-full h-screen px-5 md:px-10" id = "participants">

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
    <div class="flex flex-wrap items-center mt-5">
      <a href="{{ route('adminsuperadmin.showManageWorkshops') }}"><i
          class="fa-solid fa-arrow-left m-2 md:mr-5"></i></a>
      <div class="w-fit flex border border-gray-200 rounded-xl bg-gray-100 ">

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
          :class="tab === 0 ? active: inactive"
          class="px-5 h-8 md:w-32 rounded-xl flex justify-center items-center text-xs rounded-xl md:uppercase"
          @click="tab = 0">Approved
          @if(count($approvedParticipants))
          <p class="w-4 h-4 text-xs flex justify-center items-center text-white ml-2 rounded-full bg-slate-400">
            {{count($approvedParticipants)}}</p>
          @endif
        </button>
        <button onClick="changeURL('?pendingParticipantsPage={{$pendingParticipantsTab}}')"
          :class="tab === 1 ? active: inactive"
          class="px-5 h-8 ml-1  md:w-32 rounded-xl flex justify-center items-center text-xs rounded-xl md:uppercase"
          @click="tab = 1">
          Pending
          @if(count($pendingParticipants))
          <p class="w-4 h-4 text-xs flex justify-center items-center text-white ml-2 rounded-full bg-red-400">
            {{count($pendingParticipants)}}</p>
          @endif
        </button>
        <button onClick="changeURL('?notapprovedParticipantsPage={{$notapprovedParticipantsTab}}')"
          :class="tab === 2 ? active: inactive"
          class="px-5 h-8 ml-1 rounded-xl flex items-center text-xs rounded-xl md:uppercase" @click="tab = 2">Not
          Approved
          @if(count($notapprovedParticipants))
          <p class="w-4 h-4 text-xs flex justify-center items-center text-white ml-2 rounded-full bg-slate-400">
            {{count($notapprovedParticipants)}}</p>
          @endif
        </button>
      </div>
    </div>
    <div class="w-full bg-white rounded-xl shadow-md py-4 mt-5">
      <h1 class="p-3 text-black font-medium ml-2 ">Workshop participants Managment</h1>

      <div class="lg:w-full overflow-x-auto" x-show="tab === 0" id="modal">
        <div class="w-[800px] md:w-full">
          <div class="flex items-center p-5 justify-between">
            <p class="text-left h-8 text-xl text-green-400 w-2/4">Approved</p>
            <p class="w-1/2 font-bold text-end">{{$workshopName}}</p>
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
                <button class=" bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600 myBtn">
                  <i class="fa-solid fa-list fa-md "></i> Info </button>
                <div class="  bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center modal">
                  <div class="bg-white max-w-sm py-2 px-3 rounded shadow-2xl text-gray-800">
                    <div class=" flex justify-between items-center modal-content">
                      <h4 class="text-lg font-bold">Info User</h4>
                      <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <div class="mt-2 text-sm">
                      <p class="p-3">Name: {{$approvedParticipant->user->name}}</p>
                      <p class="p-3 ">Email: {{$approvedParticipant->user->email}}</p>
                      <p class="p-3">Description: {{$approvedParticipant->user->description}}</p>
                    </div>
                    <div class="mt-3 flex justify-end space-x-3">
                      <button class="px-3 py-1 rounded  hover:bg-red-300 hover:bg-opacity-50 hover:text-red-900"
                        id="close-modal">Cancel</button>
                    </div>
                  </div>
                </div>
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
      </div>

      <div class="lg:w-full overflow-x-auto" x-show="tab === 1">
        <div class="w-[1000px] md:w-full">
          <div class="flex items-center p-5 justify-between">
            <p class="text-left h-8 text-xl text-orange-400 w-2/4">Pending</p>
            <p class="w-1/2 font-bold text-end">{{$workshopName}}</p>
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
                <button class=" bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600 myBtn">
                  <i class="fa-solid fa-list fa-md "></i>Info</button>
                <div class="  bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center modal">
                  <div class="bg-white max-w-sm py-2 px-3 rounded shadow-2xl text-gray-800">
                    <div class=" flex justify-between items-center modal-content">
                      <h4 class="text-lg font-bold">Info User</h4>
                      <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <div class="mt-2 text-sm">
                      <p class="p-3">Name: {{$pendingParticipant->user->name}}</p>
                      <p class="p-3 ">Email: {{$pendingParticipant->user->email}}</p>
                      <p class="p-3">Description: {{$pendingParticipant->user->description}}</p>
                    </div>
                    <div class="mt-3 flex justify-end space-x-3">
                      <button class="px-3 py-1 rounded  hover:bg-red-300 hover:bg-opacity-50 hover:text-red-900"
                        id="close-modal">Cancel</button>
                    </div>
                  </div>
                </div>
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
          @if(count($pendingParticipants) == 0) <p class="w-full p-5 text-center"> No pending participant found</p>
          @endif
          <div class=" p-3">
            {{ $pendingParticipants->links() }}
          </div>
        </div>
      </div>

      <div class="lg:w-full overflow-x-auto" x-show="tab === 2">
        <div class="w-[800px] md:w-full">
          <div class="flex items-center p-5 justify-between">
            <p class="text-left h-8 text-xl text-red-400 w-2/4">Not Approved</p>
            <p class="w-1/2 font-bold text-end">{{$workshopName}}</p>
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
                <button class=" bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600 myBtn">
                  <i class="fa-solid fa-list fa-md "></i> Info</button>
                <div class="  bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center modal">
                  <div class="bg-white max-w-sm py-2 px-3 rounded shadow-2xl text-gray-800">
                    <div class=" flex justify-between items-center modal-content">
                      <h4 class="text-lg font-bold">Info User</h4>
                      <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                      </svg>
                    </div>
                    <div class="mt-2 text-sm">
                      <p class="p-3">Name: {{$notapprovedParticipant->user->name}}</p>
                      <p class="p-3 ">Email: {{$notapprovedParticipant->user->email}}</p>
                      <p class="p-3">Description: {{$notapprovedParticipant->user->description}}</p>
                    </div>
                    <div class="mt-3 flex justify-end space-x-3">
                      <button class="px-3 py-1 rounded  hover:bg-red-300 hover:bg-opacity-50 hover:text-red-900"
                        id="close-modal">Cancel</button>
                    </div>
                  </div>
                </div>
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
</div>
<script>
  Echo.channel('notification')
      .listen('NotificationEvent', (e) => {

          $("#participants").load(window.location.href + " #participants");
      });
  function changeURL($param){
  if (history.pushState) {
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + $param;
        window.history.pushState({path:newurl},'',newurl);
    }
  }
  var btns = Array.from(document.getElementsByClassName("myBtn"));
  var spans = Array.from(document.getElementsByClassName("close"));

  btns.forEach(function(btn) {
    btn.addEventListener("click", function onClick() {
      this.nextElementSibling.style.display = "flex";
    })
  })

  spans.forEach(function(span) {
    span.addEventListener("click", function() {
      this.closest(".modal").style.display = "";
    })
  })

  window.onclick = function(event) {
    let modal = event.target.closest(".modal");
    if (modal) {
      modal.style.display = "";
    }
}
</script>


@endsection