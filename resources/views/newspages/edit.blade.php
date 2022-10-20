@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
<div class="w-full p-4 px-6 flex ">

    <div class="w-full bg-white shadow-md rounded-xl  ">
        <div class="w-full flex items-center  border-b border-gray-200 mb-3">
            <a href="/news"><i class="fa-solid fa-arrow-left mx-4"></i></a>
            <h1 class="p-3 text-black  font-medium  ">News Edit</h1>
        </div>
        @if (session('status'))
        <h6>{{ session('status') }}</h6>
        @endif
        <form action="{{ url('update-news/'.$newspage->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4 flex items-center">
                <label class="w-28 text-sm mx-3 md:mx-5" for="">News Title</label>
                <div class="w-full mx-5">
                    <input type="text" name="title" value="{{$newspage->title}}"
                        class="border border-gray-200 rounded p-1 w-full " />
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4 flex items-center">
                <label class="w-28 text-sm mb-2 md:mb-0 mx-3 md:mx-5" for="">Description</label>
                <div class="w-full mx-5">
                    <textarea type="text" name="description" value=""
                        class="border border-gray-200 rounded p-1 w-full mx-5">
                    {{$newspage->description}}</textarea>
                    @error('description')
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
            <div class="mb-4 flex items-center">
                <label class="w-28 text-sm mx-3 md:mx-5">Date</label>
                <input type="datetime-local" name="time" value="{{$newspage->time}}"
                    class="border border-gray-300 rounded p-1 mx-1" />
            </div>
            <div class="mb-3 flex items-center">
                <label class="w-28 text-sm mb-2 md:mb-0 mx-3 md:mx-5">Image</label>
                <div class="w-full mx-9">
                    <input type="file" name="image" />
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <img class="object-cover mx-5 rounded" alt="Image"
                    src="{{$newspage->image ? asset('/storage/' . $newspage->image) : asset('/img/defaultNewsImg.jpg')}}"
                    width="100">
            </div>
            <div class="w-full p-2 flex justify-end border-t border-gray-200">
                <button type="submit" class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Update
                    news</button>
            </div>
        </form>
    </div>
</div>
@endsection