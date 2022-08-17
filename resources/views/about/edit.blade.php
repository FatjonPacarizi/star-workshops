@extends('layouts.app')
@section('content')
  <div class="w-full h-full p-6 flex flex-col  items-center border">

    <div class="w-full bg-white border border-gray-200 rounded mt-12">
            <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

            <h1 class = "p-3 text-slate-900">About Us</h1>
            <a href="/abouts" class="p-3 text-gray-400"> Cancel </a>
          </div>
            @if (session('status'))
                <h6 >{{ session('status') }}</h6>
            @endif

          
                    
             

                    <form action="{{ url('update-about/'.$about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">Page Title</label>
                            <input type="text" name="title" value="{{$about->title}}" class="border border-gray-200 rounded p-1 w-full mx-5">
                        </div>
                        
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">Section Title</label>
                            <textarea type="text" name="heading" value="" class="border border-gray-200 rounded p-1 w-full mx-5">{{$about->heading}}</textarea></div>
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">Description</label>
                            <textarea type="text" name="paragraph" value="" class="border border-gray-200 rounded p-1 w-full mx-5">{{$about->paragraph}}</textarea></div>
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">Button Text</label>
                            <input type="text" name="button" value="{{$about->button}}" class="border border-gray-200 rounded p-1 w-full mx-5">
                        </div>
                        
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">Image</label>
                            <input type="file" name="image" class="border border-gray-200 rounded p-1 w-full mx-5">
                            <img src="{{ asset('/storage/' .$about->image) }}" width="70px" height="70px" alt="Image">
                        </div>
                        <div class="w-full p-2 flex justify-end border-t border-gray-200">
                            <button type="submit" class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Update About</button>

                  
                        </div>

                    </form>
                    </div>

</div>

@endsection