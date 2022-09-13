@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>

<div class="w-full h-full p-6 flex flex-col mb-20 items-center border">

  <div class="w-full bg-white border  rounded ">
    <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

      <h1 class="p-3 text-slate-900">Participant Managment</h1>

    </div>

    <form method="POST" action="{{route('adminsuperadmin.storeParticipant')}}" enctype="multipart/form-data">

      @csrf
      

      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Workshop Name</label>
        <div class = "w-full mx-5">
        <select class="border border-gray-200 rounded p-1 w-full" name="workshop_id">
            <option value = "{{$workshops->id}}">{{$workshops->name}}</option>
        </select>
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>


      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Participants Name</label>
        <div class = "w-full mx-5">
        <select class="border border-gray-200 rounded p-1 w-full" name="user_id">
            <option>-- Show User -- </option>
            @foreach($users as $user)     
            @if($user->user_status == 'user') 
            <option value = "{{$user->id}}">{{$user->name}}</option>
            @endif
            @endforeach
        </select>
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="w-full p-4 flex justify-end border-t border-gray-200">
        <a href="/workshopManage" class="p-3 text-gray-400 mx-10"> Cancel </a>
        <button class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Insert Participant</button>
      </div>

    </form>
  </div>

</div>
@endsection