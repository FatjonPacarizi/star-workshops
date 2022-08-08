<x-app-layout>
  <div class="p-6 flex flex-col  items-center">

    <div class="w-full bg-white border border-gray-200 rounded pb-4">
      
            <h1 class = "p-3 text-slate-900 border-b border-gray-200 mb-4 ">About Curd</h1>
             <div class="w-full flex justify-center">
            <table class="w-full mx-4">
        
              <tr class="border-y border-gray-200 ">
                                <td class="font-bold p-3">ID</td>
                             
                                <td class="font-bold">Title</td>
                                <td class="font-bold">Title</td>
                                <td class="font-bold" >Text</td>
                                <td class="font-bold">Button</td>
                                <td class="font-bold" >Image</td>
                                <td class="font-bold text-center w-1/9">Actions</td>
                            </tr>
                        
                      
                            @foreach ($about as $item)
                            <tr  class = 'bg-gray-100'>
                                <td>{{ $item->id }}</td>
                                
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->heading }}</td>
                               
                                <td>{{ $item->paragraf }}</td>
                                <td>{{ $item->button }}</td>
                                <td>
                                    <img src="{{ asset('uploads/abouts/'.$item->image) }}" width="70px" height="70px" alt="Image">
                                </td>
                               
                                <td >
                                    <a href="{{ url('edit-about/'.$item->id) }}" class="bg-sky-500 text-white px-4 py-1 text-sm rounded m-3">Edit</a>
                                </td>
                                <td>
                                    {{-- <a href="{{ url('delete-about/'.$item->id) }}" class="bg-red-500 text-white px-4 py-1 text-sm rounded">Delete</a> --}}
                                    <form action="{{ url('delete-about/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-1 text-sm rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                     
                    </table>

                    </div>
        </div>
      </div>

</x-app-layout>