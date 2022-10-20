@extends('layouts.app')
@section('content')
<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
      <div class="mb-6 flex items-center sm:items-center">
        <label class="w-28 text-sm mx-5">Participants Name</label>
        <div class = "w-full mx-5">
          <select id='myselect'class="border border-gray-200 rounded p-1 w-full" name="user_id" single>
            <option value="">Select An Option</option>
            @foreach($users as $user)
            @if($user->user_status == 'user')
              <option value="{{$user->id}}">{{ $user->name }} - {{$user->email}}</option>
            @endif
            @endforeach
          </select>
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <script>
          $('#myselect').select2({
            width: '100%',
            placeholder: "Select an User",
            allowClear: true
          });
      </script>
      <div class="w-full p-4 flex justify-end sm:justify-end border-t border-gray-200">
        <a href="http://127.0.0.1:8000/workshops/manage" class="p-3 text-gray-400 mx-10"> Cancel </a>
        <button class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Insert Participant</button>
      </div>
    </form>
  </div>
</div>
@endsection