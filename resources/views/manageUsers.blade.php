@extends('layouts.app')
  @section('content')
  <div class="w-full h-full p-6  flex flex-col  items-center">

    <div class="w-full bg-white border border-gray-200 rounded pb-4 mt-12">

            <h1 class = "p-3 text-slate-900 border-b border-gray-200 mb-4 ">User Managment</h1>
             <div class="w-full flex justify-center">
            <table class="w-full mx-4">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3">User Status </td>
                <td class="font-bold">Name</td>
                <td class="font-bold">Verified</td>
                <td class="font-bold">Email</td>
                <td class="font-bold  w-1/5">Actions</td>
              </tr>
            @unless($users->isEmpty())
            @foreach($users as $user)
            <tr @if($user->user_status == 'superadmin') class = 'bg-gray-100' @endif>
              <td class = "p-3" >{{$user->user_status}}</td>
              <td class = "w-1/6">{{$user->name}}</td>
              <td class = "w-1/5"><div class="w-8   bg-red-500 flex justify-center items-center rounded text-white text-sm">no</div></td>
              <td ><a href="#" class = "text-blue-600"> {{$user->email}}</a></td>
              <td class = "flex items-center" >
                 <a href="/usersManager/{{$user->id}}/edit" class="bg-sky-500 text-white px-2 py-1 text-sm rounded mr-3 my-2">
                  <i class="fa-solid fa-pen mr-1 my-1"></i>
                  Edit
                  </a>
                <form method="POST" action="/usersManager/{{$user->id}}">
                  @csrf
                  @method('DELETE')
                  <button class="bg-red-500 text-white px-2 py-1 text-sm rounded">
                    <i class="fa-solid fa-trash-can  mr-1 my-1"></i> 
                                         Delete
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td >
                <p class="text-center">No users Found</p>
              </td>
            </tr>
            @endunless
    </table>
  </div>
        </div>
      </div>
      @endsection