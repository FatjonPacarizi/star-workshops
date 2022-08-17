@extends('layouts.app')
  @section('content')
  <div class="w-full flex justify-left items-left overflow-y-auto mb-10">
  <div class="w-full h-full p-6  flex flex-col  items-center ">

    <div class="w-full bg-white border border-gray-200 rounded pb-4 mt-12">

      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

        <h1 class="p-3 text-slate-900">About Managment</h1>

       

      </div>

            <div class="w-full flex justify-center">
            <table class="w-full mx-4">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3">Page Title</td>
                <td class="font-bold">Section Title</td>
                <td class="font-bold">Description</td>
                <td class="font-bold">Button Text</td>
                <td class="font-bold">Image</td>
                <td class="font-bold text-center w-1/9">Action</td>
              </tr>
                          
                            <tr  class='bg-gray-100'>

                                
                                <td class="p-3">{{$about[0]->title}}</td>
                              
                                <td>  {{ Illuminate\Support\Str::limit($about[0]->heading, 20, $end='...') }}</td>
                               
                                <td> {{ Illuminate\Support\Str::limit($about[0]->paragraph, 20, $end='...') }}</td>
                                <td>{{ $about[0]->button }}</td>
                                <td>
                                    <img src="{{ asset('/storage/'.$about[0]->image) }}" width="70px" height="70px" alt="Image">
                                </td>
                               
                                <td class = "flex justify-center items-center" >
                                    <a href="{{ url('edit-about/'.$about[0]->id) }}" class="bg-sky-500 text-white px-4 py-1 text-sm rounded m-3">   <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-pencil-outline inline-flex"></i></span>

Edit
</a>
                                </td>
                                
                            </tr>
                          
                     
                    </table>

                    </div>
        </div>
      </div>

      @endsection