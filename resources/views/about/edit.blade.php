<x-app-layout>
  <div class="p-6 flex flex-col  items-center">

    <div class="w-full bg-white border border-gray-200 rounded">
            <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

            @if (session('status'))
                <h6 >{{ session('status') }}</h6>
            @endif

          
                    <h4  class = "p-3 text-slate-900">Edit about with IMAGE

                    </h4>
                    </div>
             

                    <form action="{{ url('update-about/'.$about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">About Title</label>
                            <input type="text" name="title" value="{{$about->title}}" class="border border-gray-200 rounded p-1 w-full mx-5">
                        </div>
                        
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">About heading</label>
                            <input type="text" name="heading" value="{{$about->heading}}" class="border border-gray-200 rounded p-1 w-full mx-5">
                        </div>
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">About Paragraf</label>
                            <input type="text" name="paragraf" value="{{$about->paragraf}}" class="border border-gray-200 rounded p-1 w-full mx-5">
</div>
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">About Button</label>
                            <input type="text" name="button" value="{{$about->button}}" class="border border-gray-200 rounded p-1 w-full mx-5">
                        </div>
                        
                        <div class="mb-6 flex items-center">
                            <label class="w-28 text-sm mx-5" for="">About  Image</label>
                            <input type="file" name="image" class="border border-gray-200 rounded p-1 w-full mx-5">
                            <img src="{{ asset('uploads/abouts/'.$about->image) }}" width="70px" height="70px" alt="Image">
                        </div>
                        <div class="w-full p-2 flex justify-end border-t border-gray-200">
                            <button type="submit" class="rounded py-2 px-4 bg-blue-800 text-white hover:bg-blue-900">Update about</button>
                            <a href="{{ url('abouts') }}" class="rounded py-2 px-5 bg-blue-800 text-white hover:bg-blue-900" style="margin: 2px 22px 2px;">BACK</a>
                  
                        </div>

                    </form>

            </div>
        </div>
    </div>
</div>

</x-app-layout>