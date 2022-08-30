@extends('layouts.app')
@section('content')
    <div class="w-full h-full p-6 flex flex-col  items-center">

      <div class="w-full bg-white border border-gray-200 rounded mt-12">
              <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
              <h1 class = "p-3 text-slate-900">App Information</h1>
              <a href="/dashboard" class="p-3 text-gray-400"> Cancel</a>
            </div>

              <div class="w-full p-4">
            <form method="POST" action="/appInfos/{{$informations->id}}/edit" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                  <label class="inline-block text-lg mb-2">App Name</label>
                  <input type="text" class="border border-gray-200 rounded p-2 w-full" name="app_name"
                    value="{{$informations->app_name}}" />

                  @error('app_name')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
              

                
                <label class="inline-block text-lg mb-2">
                  Facebook
                </label>
                  <input type="text" class="border border-gray-200 rounded p-2 w-full" name="facebook"
                    value="{{$informations->facebook}}" />

                  @error('facebook')
                  <p class="text-red-500 text-xs mt-1">{{$msesage}}</p>
                  @enderror

                  <label class="inline-block text-lg mb-2">
                  Instagram
                </label>
                  <input type="text" class="border border-gray-200 rounded p-2 w-full" name="instagram"
                    value="{{$informations->instagram}}" />

                  @error('instagram')
                  <p class="text-red-500 text-xs mt-1">{{$msesage}}</p>
                  @enderror

                  <label class="inline-block text-lg mb-2">
                  Twitter
                </label>
                  <input type="text" class="border border-gray-200 rounded p-2 w-full" name="twitter"
                    value="{{$informations->twitter}}" />

                  @error('twitter')
                  <p class="text-red-500 text-xs mt-1">{{$msesage}}</p>
                  @enderror

                  <label class="inline-block text-lg mb-2">
                  Linkedin
                </label>
                  <input type="text" class="border border-gray-200 rounded p-2 w-full" name="linkedin"
                    value="{{$informations->linkedin}}" />

                  @error('linkedin')
                  <p class="text-red-500 text-xs mt-1">{{$msesage}}</p>
                  @enderror


                </div>
                
                <label  class="inline-block text-lg mb-2">
                    App Logo
                </label>
                <div class="mb-6 flex">
                  <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo_name" />
                    <img class="object-cover rounded w-1/4" alt="hero" src="{{$informations->logo_name ? asset('/storage/' . $informations->logo_name) : asset('/img/Logo.png')}}" width="10%">

                  @error('logo_name')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>



                <div class="mb-6 flex justify-end">
                  <button class="bg-sky-500 text-white rounded py-2 px-4 hover:bg-sky-600">
                    Update
                  </button>


                </div>
              </form>
            </div>
          </div>

    </div>

@endsection
