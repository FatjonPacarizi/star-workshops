@extends('layouts.app')
@section('content')
<div class="p-6 flex flex-col w-full mt-12 items-center">

    <div class="w-full bg-white border border-gray-200 rounded">
        <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
         <!-- Add About Text-->
        <h1 class="p-3 text-slate-900">App About</h1>
        <!-- Link for cancel back in abouts file index.blade -->
            <a href="http://127.0.0.1:8000/abouts" class="p-3 text-gray-400"> Cancel</a>
        </div>
        <!-- Error for add about -->
        @if ($errors->any())
        <div class="w-full flex justify-between items-center  border border-red-600 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- Form for add about call from controller create -->
        <form action="{{ url('add-about') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6 flex items-center">
                <!-- Page title, in section image and text -->
                <label class="w-28 text-sm mx-5" for="">Page Title</label>
                <input type="text" name="title" class="border border-gray-200 rounded p-1 w-full mx-5">
            </div>
            <!-- Section Title about -->
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Section Title</label>
                <input type="text" name="heading" class="border border-gray-200 rounded p-1 w-full mx-5">
            </div>
            <!-- Description about  -->
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Description</label>
                <input type="text" name="paragraph" class="border border-gray-200 rounded p-1 w-full mx-5">
            </div>
             <!-- Button about page -->
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Button Text</label>
                <input type="text" name="button" class="border border-gray-200 rounded p-1 w-full mx-5">
            </div>
            <!-- Image Section -->
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Image</label>
                <input type="file" name="image" >
            </div>
            <!-- Button Add  -->
            <div class="w-full p-2 flex justify-end border-t border-gray-200">
                <button type="submit" class="rounded py-2 px-5 bg-blue-800 text-white hover:bg-blue-900">Add About</button>
            </div>
        </form>

    </div>
</div>
</div>
</div>
</div>

@endsection