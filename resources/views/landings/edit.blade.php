@extends('layouts.app')
  @section('content')
  <div class="w-full h-screen py-6 px-6">
    <div class="w-full bg-white shadow-md  rounded-xl py-4 ">
      <h1 class="p-3 text-black font-medium ml-2 flex justify-start sm:justify-start">Manage Landing</h1>
    
      <table class="w-full " wire:loading.remove>
        <tr class="text-gray-400 text-xs border-b">
          <td class=" p-3 w-1/2">Section</td>
          <td class=" p-3 w-1/3 ">Heading</td>
          <td>Actions</td>
        </tr>
        @php 
          $i = 1;
        @endphp
        @foreach($sections as $section)
        @php 

          $img = '/img/'.$section->section_id.'_defaultimg';
          if($section->section_id == "section8")    $img = $img.'1.png';
          else $img = $img.'.png';
        @endphp
        <tr class='border-t border-gray-200' style="border-top-width: 0.01em">
          <td>
            <div class="w-full h-full flex items-center pl-5 p-2">
              <img class="w-10  rounded" alt="hero"
                src="{{$section->img_1 ? asset('/storage/' . $section->img_1) : asset($img)}}" />
              <div class="ml-3 ">
                <h1 class="text-black">{{$section->section_id}}</h1>
              </div>
            </div>
          </td>
          <td>
            <div class="w-full h-full flex items-center pl-2">
              <p class="text-xs text-gray-500">{{$section->heading}}</p>
            </div>
          </td>
          <td>
            <div class=" relative flex items-center w-full h-full pl-2" x-data="{ open: false }">
              <i class="fa-solid fa-ellipsis-vertical cursor-pointer w-3" @click="open = !open"></i>
    
              <ul id = "menu" class="bg-white absolute -left-40 top-2 z-10 shadow-lg border border-gray-100 rounded-lg w-40 py-1 "
                x-show="open" @click.outside="open = false">
                <li>
                  <p class="text-xs pl-3 p-2 text-gray-400 ">Manage Section</p>
                </li>
                <li><a
                    href="/landingpage/manage/{{$section->id}}/edit"
                    class="py-1 px-3 block hover:bg-indigo-100 ">
                    <i class="fa-solid fa-pen mr-1 fa-sm"></i>Edit</a>
                </li>
              </ul>
            </div>
          </td>
        </tr>
        @endforeach
      </table>
        
    </div>
      </div>
@endsection
