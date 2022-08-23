@extends('layouts.app')
@section('content')

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>


<div class="p-6 flex flex-col w-full mt-12 items-center">

    <div class="w-full bg-white border border-gray-200 rounded">
        <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
            <h1 class="p-3 text-slate-900">App News</h1>
            <a href="http://127.0.0.1:8000/newspages" class="p-3 text-gray-400"> Cancel</a>
        </div>
        @if ($errors->any())
        <div class="w-full flex justify-between items-center  border border-red-600 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('add-newspage') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">News Title</label>
                <input type="text" name="title" class="border border-gray-200 rounded p-1 w-full mx-5">
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Author</label>
                <input type="text" name="author" class="border border-gray-200 rounded p-1 w-full mx-5">
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
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Image</label>
                <input type="file" name="image">
            </div>
            <div class="w-full p-2 flex justify-end border-t border-gray-200">
                <button type="submit" class="rounded py-2 px-5 bg-blue-800 text-white hover:bg-blue-900">Add news</button>
            </div>
        </form>

    </div>
</div>

@endsection