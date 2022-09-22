@extends('layouts.app')
@section('content')
<div class="w-full h-full px-10 flex flex-col  items-center">
  <div class="w-full flex justify-between items-center">
    <a href="" class = " bg-white w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 text-gray-400 hover:shadow  "><i class="fa-solid fa-plus font-thin text-2xl"></i></a>
    <livewire:filter-faq/>
</div>
  <div class="w-full bg-white shadow-md rounded-xl  py-4 " >

    <h1 class="p-3 text-black  font-medium ml-2 ">Manage Stream</h1>

    <div class="w-full flex justify-center">
        <table class="w-full mx-4  font-thin">
          <tr class="border-y border-gray-200 ">
            <td class="font-bold">Title</td>
            <td class="font-bold">Workshop</td>
            <td class="font-bold w-1/5 ">Actions</td>
          </tr>
     
        @forelse($streaming as $str)
        <tr class = 'border-b border-gray-200'>

          <td>  {{$str->name}}</td>
          <td> {{$str->workshop[0]->name}}
          <td class = "flex items-center " >    
             <a href="" class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
              <i class="fa-solid fa-pen fa-md"></i>
                  Edit
              </a>
            <form method="POST" action="">
              @csrf
              @method('DELETE')
              <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                <i class="fa-solid fa-trash-can  fa-md"></i>
                Delete
              </button>
            </form>         
          </td>  
        </tr>
        @empty
    <p></p>
@endforelse
</table>
</div>
</div>
</div>
</div>
@endsection
  {{-- box-shadow: rgba(149, 157, 165, 0.2) 0px 24px 30px; --}}
