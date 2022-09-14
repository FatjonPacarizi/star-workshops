@php
$date = new DateTime("now", new DateTimeZone('Europe/Tirane') );

@endphp

<div class="w-full h-screen p-6  flex flex-col  items-center ">

  <div class="w-full bg-white  rounded pb-4 mt-12">
    <div class="w-full flex justify-between border-b">
      <h1 class="p-3 text-slate-900">Workshop participants Managment</h1>
    </div>
    <div>
      <p class="text-left h-8 m-5 text-xl text-orange-400 w-2/4">Pending</p>
      <table class="w-full ">
        <tr class="border-y border-gray-200 ">
          <td class="font-bold p-3 w-1/4">User Name</td>
          <td class="font-bold p-3 w-1/4">User Email</td>
          <td class="font-bold w-1/4">Applied On</td>
        </tr>

        @foreach($pendingParticipants as $pendingParticipant)
        <tr class='border-b border-gray-200'>
          <td class="p-3 ">{{$pendingParticipant->name}}</td>
          <td class="p-3 ">{{$pendingParticipant->email}}</td>
          <td><a href="#" class="text-blue-600"> {{$pendingParticipant->appliedOn}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($pendingParticipants) == 0) <p class="w-full p-5 text-center"> No pending participant found</p> @endif
      <div class=" p-3">
        {{ $pendingParticipants->links() }}
      </div>
    </div>

    <div>
      <p class="text-left h-8 m-5 text-xl text-green-500">Approved</p>
      <table class="w-full">
        <tr class="border-y border-gray-200 h-8 ">
          <td class="font-bold p-3 w-1/4">User Name</td>
          <td class="font-bold p-3 w-1/4">User Email</td>
          <td class="font-bold w-1/4">Applied On</td>
        </tr>

        @foreach($approvedParticipants as $approvedParticipant)
        <tr class='border-b border-gray-200 '>
          <td class="p-3">{{$approvedParticipant->name}}</td>
          <td class="p-3 ">{{$approvedParticipant->email}}</td>
          <td><a href="#" class="text-blue-600"> {{$approvedParticipant->appliedOn}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($approvedParticipants) == 0) <p class="w-full p-5 text-center"> No approved participant found</p> @endif
      <div class="p-3">
        {{ $approvedParticipants->links() }}
      </div>
    </div>

    <div>
      <p class="text-left h-8 m-5 text-xl text-red-500">Not Approved</p>
      <table class="w-full">
        <tr class="border-y border-gray-200 h-8 ">
          <td class="font-bold p-3 w-1/4">User Name</td>
          <td class="font-bold p-3 w-1/4">User Email</td>
          <td class="font-bold w-1/4">Applied On</td>
        </tr>

        @foreach($notapprovedParticipants as $notapprovedParticipant)
        <tr class='border-b border-gray-200 '>
          <td class="p-3">{{$notapprovedParticipant->name}}</td>
          <td class="p-3 ">{{$notapprovedParticipant->email}}</td>
          <td><a href="#" class="text-blue-600"> {{$notapprovedParticipant->appliedOn}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($notapprovedParticipants) == 0) <p class="w-full p-5 text-center"> No not approved participant found</p> @endif
      <div class="p-3">
        {{ $notapprovedParticipants->links() }}
      </div>
    </div>

  </div>
</div>
