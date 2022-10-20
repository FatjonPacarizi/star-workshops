@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
<div class="w-full  p-6 px-5 md:px-10 flex ">
  <div class="w-full bg-white   shadow-md rounded-xl  ">
    <div class="w-full flex items-center  border-b border-gray-200 mb-4">
      <a href="/workshops/manage/streaminglive/{{$workshops->id}}" ><i class="fa-solid fa-arrow-left mx-4"></i></a>
      <h1 class="p-3 text-black  font-medium  ">Streaming Update</h1>
    </div>
    <form method="POST" action="/update-streaming/{{$streaming->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
    <div class="mb-6 flex flex-col md:flex-row md:items-center">
        <label class="w-28 text-sm mx-5">Workshop Name</label>
        <div class = "w-11/12 md:w-full mx-auto mt-2 md:mt-0 md:mx-5">
        <select class="border border-gray-200 rounded p-1 w-full" name="workshop_id">
            <option value = "{{$streaming->workshop->id}}">{{$streaming->workshop->name}}</option>
        </select>
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <input hidden type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Name" name="status" value="{{$streaming->status}}" />

      <div class="mb-6 flex flex-col md:flex-row md:items-center">
        <label class="w-28 text-sm mx-5">Title</label>
        <div class = "w-11/12 md:w-full mx-auto mt-2 md:mt-0 md:mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" value="{{$streaming->title}}" name="title" />
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mb-6 flex flex-col md:flex-row md:items-center">
        <label class="w-28 text-sm mx-5">Video Url</label>
        <div class = "w-11/12 md:w-full mx-auto mt-2 md:mt-0 md:mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Url" value="{{$streaming->url}}" name="url"/>
          @error('url')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mb-6 flex flex-col md:flex-row md:items-center">
        <label class="w-28 text-sm mx-5" for="">Description</label>
        <textarea type="text" name="description" class="border border-gray-200 rounded p-1 w-full mx-5">{{$streaming->description}}</textarea>
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

      <div class="w-full p-4 flex justify-end border-t border-gray-200">
        <a href="/workshops/manage/streaminglive/{{$workshops->id}}" class="p-3 text-gray-400 mx-10"> Cancel </a>
        <button class="rounded py-2 px-4 bg-sky-500 text-white text-sm md:text-md hover:bg-sky-600">Update Streaming</button>
      </div>

    </form>
  </div>
</div>
@endsection