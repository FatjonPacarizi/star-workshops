@extends('layouts.app')
@section('content')
<div class="w-full h-full p-6 flex flex-col  items-center border">

    <div class="w-full bg-white border border-gray-200 rounded mt-12">
        <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

            <h1 class="p-3 text-slate-900">News Page</h1>
            <a href="/newspages" class="p-3 text-gray-400"> Cancel </a>
        </div>
        @if (session('status'))
        <h6>{{ session('status') }}</h6>
        @endif

        <form action="{{ url('update-newspage/'.$newspage->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">News Title</label>
                <input type="text" name="title" value="{{$newspage->title}}" class="border border-gray-200 rounded p-1 w-full mx-5">
            </div>

            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Author</label>
                <textarea type="text" name="author" value="" class="border border-gray-200 rounded p-1 w-full mx-5">
                {{$newspage->author}}</textarea>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Description</label>
                <textarea type="text" name="description" value="" class="border border-gray-200 rounded p-1 w-full mx-5">
                {{$newspage->description}}</textarea>
            </div>
            <div class="mb-6  flex items-center">
                <label class="w-28 text-sm mx-5">Image</label>
                <input type="file" name="image" />

                <img class="object-cover rounded" alt="Image" src="{{$newspage->image ? asset('uploads/newspages/'.$newspage->image) : asset('/img/team1.png')}}" width="100">

            </div>

            <div class="w-full p-2 flex justify-end border-t border-gray-200">
                <button type="submit" class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Update news</button>


            </div>

        </form>
    </div>

</div>

@endsection