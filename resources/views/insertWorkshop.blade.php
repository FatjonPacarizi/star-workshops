@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
<div class="w-full  p-6 px-10 flex ">
  <div class="w-full bg-white   shadow-md rounded-xl  ">
    <div class="w-full flex items-center  border-b border-gray-200 mb-4">
      <a href="{{ route('adminsuperadmin.showManageWorkshops') }}" ><i class="fa-solid fa-arrow-left mx-4"></i></a>
      <h1 class="p-3 text-black  font-medium  ">Workshop Insert</h1>
    </div>
    <form method="POST" action="{{route('adminsuperadmin.storeWorkshop')}}" enctype="multipart/form-data">
      @csrf
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Name</label>
        <div class = "w-full mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Name" name="name"  value="{{old('name')}}"/>
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Participants Limit</label>
        <div class = "w-full mx-5">
          <input type="number" class="border border-gray-200 rounded p-1 w-full" placeholder="Limit participants" name="limited_participants" value="{{old('limited_participants')}}" />
          @error('limited_participants')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5" for="">Description</label>
        <textarea type="text" name="description" class="border border-gray-200 rounded p-1 w-full mx-5">{{old('description')}}</textarea>
      </div>
      <script>
        tinymce.init({
          selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
          height: 300,
          plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
            'table', 'emoticons', 'template', 'help'
          ],
          toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | help',
          menubar: 'file edit view insert format tools table help'
        });
      </script>

      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Country</label>
        <div class = "w-full mx-5">
          <select class="w-full rounded border border-gray-200 p-1" name='country_id'>
            @foreach($countries as $country)
            <option @if(old('country_id') == $country->id) selected @endif value='{{$country->id}}' >{{$country->name}}</option>
            @endforeach

          </select>

          @error('country_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">City</label>
        <div class = "w-full mx-5">
          <select class="w-full  rounded border border-gray-200 p-1" name='city_id'>
            @foreach($cities as $city)
            <option @if(old('city_id') == $city->id) selected @endif value='{{$city->id}}'>{{$city->name}}</option>
            @endforeach
          </select>
          @error('city_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Type</label>
        <div class = "w-full mx-5">
          <select class="w-full rounded border border-gray-200 p-1" name='type_id'>
            @foreach($types as $type)
            <option @if(old('type_id') == $type->id) selected @endif value='{{$type->id}}'>{{$type->name}}</option>
            @endforeach
          </select>
          @error('type_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Categories</label>
        <div class = "w-full mx-5">
          <select class="w-full rounded border border-gray-200 p-1" name='category_id'>
            @foreach($categories as $category)
            <option @if(old('category_id') == $category->id) selected @endif value='{{$category->id}}'>{{$category->name}}</option>
            @endforeach
          </select>
          @error('category_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mb-6 mx-1 flex items-center">
        <label class="w-28 text-sm mx-5">Time</label>
        <div>
          <input  type="datetime-local" name="time"  value="{{old('time')}}" class="border border-gray-300 rounded p-1 "/>
          @error('time')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Link</label>
        <div class = "w-full mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Link" name="filedlink" value="{{old('filedlink')}}"/>
          @error('filedlink')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5">Image</label>
        <div>
          <input type="file" name="img_workshop" />
          @error('img_workshop')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="w-full p-4 flex justify-end border-t border-gray-200">
        <a href="/workshops/manage" class="p-3 text-gray-400 mx-10"> Cancel </a>
        <button class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Insert Workshop</button>
      </div>
    </form>
  </div>
</div>
@endsection