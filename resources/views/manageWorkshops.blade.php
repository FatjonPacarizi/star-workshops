@extends('layouts.app')
  @section('content')
  <div class="w-full h-full p-6  flex flex-col  items-center">

    <div class="w-full bg-white border border-gray-200 rounded pb-4 mt-12">

      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

        <h1 class = "p-3 text-slate-900">Workshop Managment</h1>

          <div class="flex mx-4 ">
            
            <a class="mx-2 flex items-center" href="{{route('adminsuperadmin.showInsert')}}">
              <h2 class = "text-gray-500 ">Create Workshop</h2>
              <p class = "text-2xl ml-2 text-gray-500 ">+</p>
            </a>
          </div>
        
      </div>


             <div class="w-full flex justify-center">
            <table class="w-full mx-4">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3">Workshop Name</td>
                <td class="font-bold">Workshop time</td>
                <td class="font-bold text-center">Actions</td>
              </tr>
            @unless($workshops->isEmpty())
            @foreach($workshops as $workshop)
            <tr class = 'border-b border-gray-200'>
              <td class="p-3">{{$workshop->name}}</td>
              <td ><a href="#" class = "text-blue-600"> {{$workshop->time}}</a></td>
              <td class = "flex justify-center items-center" >
                 <a href="/workshopManage/{{$workshop->id}}/edit" class="bg-sky-500 text-white px-4 py-1 text-sm rounded m-3">
                  <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-pencil-outline inline-flex"></i></span>

                  Edit
                  </a>
                <form method="POST" action="/workshopManage/{{$workshop->id}}">
                  @csrf
                  @method('DELETE')
                  <button class="bg-red-500 text-white px-4 py-1 text-sm rounded">
                  <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-delete-outline inline-flex"></i></span>
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