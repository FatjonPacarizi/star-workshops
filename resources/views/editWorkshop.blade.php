@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>

<div class="w-full  p-6 px-10 flex ">

  <div class="w-full bg-white   shadow-md rounded-xl  ">
    <div class="w-full flex items-center  border-b border-gray-200 mb-4">
      <a href="{{ route('adminsuperadmin.showManageWorkshops') }}" ><i class="fa-solid fa-arrow-left mx-4"></i></a>
      <h1 class="p-3 text-black  font-medium  ">Workshop Edit</h1>
    </div>

    <form method="POST" action="/workshops/manage/{{$workshop->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Name</label>
        <div class="w-full mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Name" name="name"
            value="{{$workshop->name}}" />
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Participants Limit</label>
        <div class="w-full mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Limit participants"
            name="limited_participants" value="{{$workshop->limited_participants}}" />
          @error('limited_participants')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5" for="">Description</label>
        <textarea type="text" name="description" value="" class="border border-gray-200 rounded p-1 w-full ">
        {{$workshop->description}}</textarea>
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
        <div class="w-full mx-5">
          <select class="w-full rounded border border-gray-200 p-1" name='country_id'>
            @foreach($countries as $country)
            <option @if($workshop->country_id == $country->id) selected @endif value =
              '{{$country->id}}'>{{$country->name}}</option>
            @endforeach
          </select>
          @error('country_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">City</label>
        <div class="w-full mx-5">
          <select class="w-full rounded border border-gray-200 p-1" name='city_id'>
            @foreach($cities as $city)
            <option @if($workshop->city_id == $city->id) selected @endif value = '{{$city->id}}'>{{$city->name}}
            </option>
            @endforeach
          </select>
          @error('city_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Type</label>
        <div class="w-full mx-5">
          <select class="w-full  rounded border border-gray-200 p-1" name='type_id'>
            @foreach($types as $type)
            <option @if($workshop->type_id == $type->id) selected @endif value = '{{$type->id}}'>{{$type->name}}
            </option>
            @endforeach
          </select>
          @error('type_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Categories</label>
        <div class="w-full mx-5">
          <select class="w-full rounded border border-gray-200 p-1" name='category_id'>
            @foreach($categories as $category)
            <option @if($workshop->category_id == $category->id) selected @endif value =
              '{{$category->id}}'>{{$category->name}}</option>
            @endforeach
          </select>
          @error('category_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5">Time</label>
        <div class="mx-1">
          <input type="datetime-local" name="time" value="{{$workshop->time}}" class="border border-gray-300 rounded p-1 "/>
          @error('time')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        @if ($workshop->workshop_endTime != null)
         <p class = "ml-3 text-red-500">Ended at : {{$workshop->workshop_endTime}}</p> 
        @endif
      </div>
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Link</label>
        <div class="w-full mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Link" name="filedlink" />
          @error('filedlink')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5">Image</label>
        <input type="file" name="img_workshop" />

        <img class="object-cover rounded" alt="hero"
          src="{{$workshop->img_workshop ? asset('/storage/' . $workshop->img_workshop) : asset('/img/test.jpg')}}"
          width="100">
      </div>
      <div class="w-full p-4 flex justify-end border-t border-gray-200">
        <a href="/workshops/manage" class="p-3 text-gray-400 mx-10"> Cancel </a>
        <button class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600" type = "submit">Update Workshop</button>
      </div>
    </form>
  </div>
</div>
@endsection