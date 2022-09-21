@extends('layouts.app')
@section('content')
<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
<div class="w-full  p-6 px-10 flex ">
    <div class="w-full bg-white   shadow-md rounded-xl  ">
      <div class="w-full flex items-center  border-b border-gray-200 mb-4">
        <h1 class="p-3 text-black  font-medium  ">App infos Edit</h1>
      </div>
        @if (session('status'))
        <h6>{{ session('status') }}</h6>
        @endif
            <form method="POST" action="/appinformations/{{$informations->id}}/edit" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">App Name</label>
                <div class="w-full mx-5">
                    <input type="text" name="app_name" value="{{$informations->app_name}}" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('app_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Facebook</label>
                <div class="w-full mx-5">
                    <input type="text" name="facebook" value="{{$informations->facebook}}" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('facebook')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Instagram</label>
                <div class="w-full mx-5">
                    <input type="text" name="instagram" value="{{$informations->instagram}}" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('instagram')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Twitter</label>
                <div class="w-full mx-5">
                    <input type="text" name="twitter" value="{{$informations->twitter}}" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('twitter')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Linkedin</label>
                <div class="w-full mx-5">
                    <input type="text" name="linkedin" value="{{$informations->linkedin}}" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('linkedin')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6  flex items-center">
                <label class="w-28 text-sm mx-5">App Logo</label>
                <div class="w-full mx-9">
                    <input type="file" name="image" />
                    @error('logo_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                 </div>
                <img class="object-cover mx-5 rounded" alt="Image" src="{{$informations->logo_name ? asset('/storage/' . $informations->logo_name) : asset('/img/Logo.png')}}" width="100">
            </div>
            <div class="w-full p-2 flex justify-end border-t border-gray-200">
                <button type="submit" class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Update App</button>
            </div>
        </form>
    </div>
</div>
@endsection