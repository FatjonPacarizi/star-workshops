@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left overflow-y-auto mb-10">
  <div class="w-full h-full p-6  flex flex-col  items-center ">

    <div class="w-full bg-white border border-gray-200 rounded pb-4 mt-12">

      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

        <h1 class="p-3 text-slate-900">News Managment</h1>

        <div class="flex mx-4 ">

          <a class="mx-2 flex items-center" href="http://127.0.0.1:8000/add-newspage">
            <h6 class="text-2xl mr-1 -mt-1 text-gray-400 ">+</h6>
            <h2 class="text-gray-400 ">Create news</h2>
          </a>
        </div>

      </div>


      @if (session('status'))
      <div class="w-full flex justify-center">{{ session('status') }}</div>
      @endif
      <div class="w-full flex justify-center">
        <table class="w-full mx-4">
          <tr class="border-y border-gray-200">
            <td class="font-bold p-3">News Title</td>
            <td class="font-bold">Author</td>
            <td class="font-bold">Description</td>
            <td class="font-bold">Image</td>
            <td class="font-bold text-center w-1/9">Action</td>
          </tr>
          @foreach ($newspage as $item)
          <tr class='bg-white-100 border-y border-gray-200'>


            <td class="p-3">{{ Illuminate\Support\Str::limit($item->title, 20, $end='...') }}</td>

            <td> {{ $item->author }}</td>

            <td> {!! Illuminate\Support\Str::limit($item->description, 50, $end='...') !!}</td>
            <td>
              <img src="{{ asset('uploads/newspages/'.$item->image) }}" width="70px" height="70px" alt="Image">
            </td>

            <td>
              <a href="{{ url('edit-newspage/'.$item->id) }}" class="bg-sky-500 text-white px-4 py-1 text-sm rounded ">Edit</a>
            </td>
            <td>
                            <form action="{{ url('delete-newspage/'.$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger bg-red-600 text-white px-4 py-1 text-sm rounded btn-sm">Delete</button>
                            </form>
                        </td>

          </tr>
          @endforeach

        </table>

      </div>

    </div>
  </div>
  @endsection