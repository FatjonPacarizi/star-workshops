@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
<div class="w-full h-full p-6 flex flex-col  items-center border">
    <div class="w-full bg-white  rounded ">
        <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
            <h1 class="p-3 text-slate-900">App About</h1>
            <a href="/abouts" class="p-3 text-gray-400"> Cancel </a>
        </div>
        @if (session('status'))
        <h6>{{ session('status') }}</h6>
        @endif
      <form action="{{ url('update-about/'.$about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Section Title</label>
                <div class="w-full mx-5">
                    <input type="text" name="title" value="{{$about->title}}" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Section Title</label>
                <div class="w-full mx-5">
                    <input type="text" name="heading" value="{{$about->heading}}" class="border border-gray-200 rounded p-1 w-full ">                
                    @error('heading')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Description</label>
                <div class="w-full mx-5">
                    <textarea type="text" name="paragraph" value="" class="border border-gray-200 rounded p-1 w-full mx-5">{{$about->paragraph}}</textarea>
                    @error('paragraph')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
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
        <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Button Text</label>
                <div class="w-full mx-5">
                    <input type="text" name="button" value="{{$about->button}}" class="border border-gray-200 rounded p-1 w-full ">                
                    @error('button')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6  flex items-center">
                <label class="w-28 text-sm mx-5">Section Image</label>
                <div class="w-full mx-9">
                    <input type="file" name="image" />
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                 </div>
                <img class="object-cover mx-5 rounded" alt="Image" src="{{$about->image ? asset('/storage/' . $about->image) : asset('/img/defultaboutimage.png')}}" width="100">
            </div>
            <div class="w-full p-4 flex justify-end border-t border-gray-200">
                <button type="submit" class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Update </button>
            </div>
        </form>
    </div>
</div>
@endsection