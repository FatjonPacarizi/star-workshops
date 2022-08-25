@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>

<div class="w-full h-full p-6 flex flex-col  items-center border">

  <div class="w-full bg-white border border-gray-200 rounded mt-12">
    <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

      <h1 class="p-3 text-slate-900">Workshop Managment</h1>

    </div>

    <form method="POST" action="{{route('adminsuperadmin.storeWorkshop')}}" enctype="multipart/form-data">
      @csrf
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Name</label>
        <input type="text" class="border border-gray-200 rounded p-1 w-full mx-5" placeholder="Name" name="name" />

        @error('name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Participants Limit</label>
        <input type="text" class="border border-gray-200 rounded p-1 w-full mx-5" placeholder="Limit participants" name="limited_participants" />

        @error('name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5" for="">Description</label>
        <textarea type="text" name="description" class="border border-gray-200 rounded p-1 w-full mx-5"></textarea>
      </div>
      <script>
        tinymce.init({
          selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
          width: 1040,
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

        <select class="w-full mx-5 rounded border border-gray-200 p-1" name='country_id'>

          @foreach($countries as $country)
          <option value='{{$country->id}}'>{{$country->name}}</option>
          @endforeach

        </select>

        @error('user_status')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">City</label>

        <select class="w-full mx-5 rounded border border-gray-200 p-1" name='city_id'>

          @foreach($cities as $city)
          <option value='{{$city->id}}'>{{$city->name}}</option>
          @endforeach

        </select>

        @error('user_status')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Type</label>

        <select class="w-full mx-5 rounded border border-gray-200 p-1" name='type_id'>

          @foreach($types as $type)
          <option value='{{$type->id}}'>{{$type->name}}</option>
          @endforeach

        </select>

        @error('user_status')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>



      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Categories</label>

        <select class="w-full mx-5 rounded border border-gray-200 p-1" name='category_id'>

          @foreach($categories as $category)
          <option value='{{$category->id}}'>{{$category->name}}</option>
          @endforeach

        </select>

        @error('user_status')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>



      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5">Time</label>
        <input type="datetime-local" name="time" />

      </div>

      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5">Image</label>
        <input type="file" name="img_workshop" />
      </div>


      <div class="w-full p-2 flex justify-end border-t border-gray-200">
        <a href="/workshopManage" class="p-3 text-gray-400 mx-10"> Cancel </a>
        <button class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Insert Workshop</button>


      </div>
    </form>
  </div>

</div>
@endsection