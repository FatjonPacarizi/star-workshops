@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left overflow-y-auto mb-10">
  <div class="w-full h-full p-6  flex flex-col  items-center ">

    <div class="w-full bg-white border border-gray-200 rounded pb-4 mt-12">

      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

        <h1 class="p-3 text-slate-900">Landing Managment</h1>

        <div class="flex mx-4 ">

          <a class="mx-2 flex items-center" href="http://127.0.0.1:8000/add-landing">
            <h6 class="text-2xl mr-1 -mt-1 text-gray-400 ">+</h6>
            <h2 class="text-gray-400 ">Create Landing</h2>

          </a>
        </div>

      </div>


      @if (session('status'))
      <div class="w-full flex justify-center">{{ session('status') }}</div>
      @endif
      <div class="w-full flex justify-center">
        <table class="w-full mx-4">
          <tr class="border-y border-gray-200">
            <td class="font-bold p-3">Page Title</td>
            <td class="font-bold">Section Title</td>
            <td class="font-bold">Description</td>
            <td class="font-bold">Button Text</td>
            <td class="font-bold">Image</td>
            <td class="font-bold text-center w-1/9">Action</td>
          </tr>
          @foreach ($landing as $item)
          <tr class='bg-white-100 border-y border-gray-200'>


            <td class="p-3">{{ $item->title }}</td>

            <td> {{ Illuminate\Support\Str::limit($item->heading, 20, $end='...') }}</td>

            <td> {{ Illuminate\Support\Str::limit($item->paragraf, 20, $end='...') }}</td>
            <td>{{ $item->button }}</td>
            <td>
              <img src="{{ asset('uploads/landings/'.$item->image) }}" width="70px" height="70px" alt="Image">
            </td>

            <td>
              <a href="{{ url('edit-landing/'.$item->id) }}" class="bg-sky-500 text-white px-4 py-1 text-sm rounded m-3">Edit</a>
            </td>

          </tr>
          @endforeach

        </table>

      </div>

    </div>
  </div>
  @endsection