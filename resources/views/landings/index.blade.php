@extends('layouts.app')
@section('content')
<div class="w-full h-full p-6  flex flex-col  items-center">

  <div class="w-full bg-white border border-gray-200 rounded pb-4 mt-12">

    <h1 class="p-3 text-slate-900 border-b border-gray-200 mb-4 ">Landing Managment</h1>
    <a class="mx-8" href="http://127.0.0.1:8000/add-landing">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
        </path>
      </svg>
    </a>
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
        <tr class='bg-gray-100'>


          <td>{{ $item->title }}</td>

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