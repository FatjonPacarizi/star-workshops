@php
  $date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
  
@endphp

@extends('layouts.app')
  @section('content')
  <div class="w-full h-full p-6  flex flex-col  items-center ">

    <div class="w-full bg-white border border-gray-200 rounded pb-4 mt-12">

      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

        <h1 class = "p-3 text-slate-900">Workshop participants Managment</h1>

        
      </div>


             <div class=" flex justify-center items-start">
            <table class="w-1/2 mx-4  font-thin ">
              <th class = "text-left h-8">Pending</th>
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3 ">User Name</td>
                <td class="font-bold">Applied On</td>
                <td class="font-bold  ">Actions</td>
              </tr>
              

            @unless($pendingParticipants->isEmpty())
            @foreach($pendingParticipants as $pendingParticipant)
            <tr class = 'border-b border-gray-200'>
              <td class="p-3 ">{{$pendingParticipant->name}}</td>
             
              <td ><a href="#" class = "text-blue-600"> {{$pendingParticipant->time}}</a></td>
              <td class = "flex items-center " >
                 <a href="/workshopManage/{{$pendingParticipant->id}}/edit" class="bg-sky-500 text-white px-3 py-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                  <i class="fa-solid fa-list fa-md "></i>
                      Info
                  </a>
                  <form method="POST" action={{route('adminsuperadmin.addParticipant',[$pendingParticipant->workshopID,$pendingParticipant->user_id])}}>
                    @csrf
                    @method('PUT')
                    <button class="bg-green-600  text-white px-3 py-2  text-xs rounded mr-3 hover:bg-green-700">
                      <i class="fa-solid fa-user-plus"></i>
                      Add 
                    </button>
                  </form>
                
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td ></td>
              <td class = "p-5">
                No pending participant Found
              </td>
            </tr>
            @endunless
    </table>
    <table class="w-1/2 mx-4  font-thin">
      <th class = "text-left h-8">Approved</th>
      <tr class="border-y border-gray-200 h-8 ">
        <td class="font-bold p-3 ">User Name</td>
        <td class="font-bold">Applied On</td>
        <td class="font-bold  ">Actions</td>
      </tr>
      

    @unless($approvedParticipants->isEmpty())
    @foreach($approvedParticipants as $approvedParticipant)
    <tr class = 'border-b border-gray-200 '>
      <td class="p-3">{{$approvedParticipant->name}}</td>
     
      <td ><a href="#" class = "text-blue-600"> {{$approvedParticipant->time}}</a></td>
      <td >
        <div class="relative h-10 flex items-center" >
          
          <button onClick = "showOptions()"  class="bg-sky-500 text-white px-2 text-sm  py-1 rounded" type="button">Options <i class="fa-solid fa-caret-down"></i></button>
            <!-- Dropdown menu -->
            <div id="dropdownDivider" class="hidden z-10 absolute bg-white rounded shadow -bottom-20">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                  <li>
                    <a href="/workshopManage/{{$approvedParticipant->id}}/edit" class="block py-2 px-4 hover:bg-gray-100 ">
                      <i class="fa-solid fa-list mr-2"></i>
                          Info
                      </a>
                  </li>
                  <li>
                    <form method="POST" action={{route('adminsuperadmin.removeParticipant',[$approvedParticipant->workshopID,$approvedParticipant->user_id])}} ">
                      @csrf
                      @method('DELETE')
                      <button class="block py-2 px-4 text-sm text-red-400 hover:bg-gray-100 hover:text-red-600 ">
                        <i class="fa-solid fa-user-xmark mr-2"></i>
                        Remove
                      </button>
                    </form>
                  </li>
                </ul>
              
              </div>
            </div>
      </td>
    </tr>
    @endforeach
    @else
    <tr>
      <td ></td>
      <td class = "p-5">
        No approved participant found
      </td>
    </tr>
    @endunless
</table>

  </div>
        </div>
      </div>
<script>
      function showOptions() {
        var element = document.getElementById("dropdownDivider");
        element.classList.toggle("hidden");
      }
</script>
@endsection