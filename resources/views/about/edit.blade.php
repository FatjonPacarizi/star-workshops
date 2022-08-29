@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
    <div class="w-full h-full p-6 flex flex-col  items-center">

      <div class="w-full bg-white border border-gray-200 rounded mt-12">
              <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
              <h1 class = "p-3 text-slate-900">App About</h1>
              <a href="/dashboard" class="p-3 text-gray-400"> Cancel</a>
            </div>

              <div class="w-full p-4">
                <form action="/update/{{$about->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                      <label class="inline-block text-lg mb-2">Page Title</label>
                      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        value="{{$about->title}}" />
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    <label class="inline-block text-lg mb-2">
                      Section Title
                    </label>
                      <textarea type="text" class="border border-gray-200 rounded p-2 w-full" name="heading" value="" />{{$about->heading}}</textarea>
                      @error('heading')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                      <label class="inline-block text-lg mb-2">
                      Description
                    </label>
                      <textarea type="text" class="border border-gray-200 rounded p-2 w-full" name="paragraph" value="" />{{$about->paragraph}}</textarea>
                      @error('paragraph')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                      <label class="inline-block text-lg mb-2">
                    Button Text
                    </label>
                      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="button"
                        value="{{$about->button}}" />
                        @error('button')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                    
                    <label  class="inline-block text-lg mb-2">
                        Section Image
                    </label>
                    <div class="mb-6 flex">
                      <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
                        <img class="object-cover rounded w-1/4" alt="hero" src="{{$about->image ? asset('/storage/' . $about->image) : asset('img/defultaboutimage.png') }}" width="10%">
                        @error('image')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    
                    </div>

                    <div class="mb-6 flex justify-end">
                      <button type = "submit" class="bg-sky-500 text-white rounded py-2 px-4 hover:bg-sky-600">
                        Update
                      </button>


                    </div>
              </form>
            </div>
          </div>

    </div>

@endsection
