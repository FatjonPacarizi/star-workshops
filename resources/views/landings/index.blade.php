@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>

<div class="w-full h-full p-6 flex flex-col  items-center">

  <div class="w-full bg-white border border-gray-200 rounded mt-12">
    <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
      <h1 class="p-3 text-slate-900">App landing</h1>
      <a href="/dashboard" class="p-3 text-gray-400"> Cancel</a>
    </div>

    <div class="w-full p-4">
      <form action="{{ url('update-landing/'.$landing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
          <label class="inline-block text-lg mb-2">Page Title</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$landing->title}}" />
          <label class="inline-block text-lg mb-2">
            Section Title
          </label>
          <textarea type="text" class="border border-gray-200 rounded p-2 w-full" name="heading" value="" />{{$landing->heading}}</textarea>
          <label class="inline-block text-lg mb-2">
            Description
          </label>
          <textarea type="text" id="descriptionparagraph" class="border border-gray-200 rounded p-2 w-full" name="paragraf" value="" />{{$landing->paragraf}}</textarea>
          <label class="inline-block text-lg mb-2">
            Button Text
          </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="button" value="{{$landing->button}}" />
        </div>

        <script>
                tinymce.init({
                    selector: 'textarea#descriptionparagraph', // Replace this CSS selector to match the placeholder element for TinyMCE
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

        <label class="inline-block text-lg mb-2">
          Section Image
        </label>
        <div class="mb-6 flex">
          <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
          <img class="object-cover rounded w-1/4" alt="hero" src="{{$landing->image ? asset('/storage/' . $landing->image) : asset('/img/defaultLandingImg.png')}}" width="50%" height="50px">
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