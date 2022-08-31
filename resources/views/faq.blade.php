
@extends('layouts.app')
@section('content')

<div class="w-full h-full p-6  flex flex-col  items-center ">

<div class="w-full bg-white 200 rounded pb-4 ">

  <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

    <h1 class = "p-3 text-slate-900">FAQ</h1>

      <div class="flex mx-4 ">
        
        <a class="mx-2 flex items-center" href="/faq/create">
          <h6 class = "text-2xl mr-1 -mt-1 text-gray-400 ">+</h6>
          <h2 class = "text-gray-400 ">Create FAQ</h2>
          
        </a>
      </div>
    
  </div>


         <div class="w-full flex justify-center">
        <table class="w-full mx-4  font-thin">
          <tr class="border-y border-gray-200 ">
            <td class="font-bold p-3 ">#</td>
            <td class="font-bold">Question</td>
            <td class="font-bold">Status</td>
            <td class="font-bold w-1/5 ">Actions</td>
          </tr>

        @php $i=1 @endphp
        @foreach($faq as $f)
        <tr class = 'border-b border-gray-200'>
          <td class="p-3 ">{{$i++}}</td>
          <td>  {{$f->question}}</td>
          <td>
            @if($f->status == 'Active')
            <a href="{{ url('change-status/'.$f->id)}}" class="bg-green-500 text-white p-2 text-xs rounded mr-3 hover:bg-green-600">Active</a>
            @else
            <a href="{{ url('change-status/'.$f->id)}}" class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">Deactive</a>
            @endif
          </td>
          <td class = "flex items-center " >    
             <a href="faq/{{$f->id}}/edit" class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
              <i class="fa-solid fa-pen fa-md"></i>
                  Edit
              </a>
            <form method="POST" action="faq/{{$f->id}}">
              @csrf
              @method('DELETE')
              <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                <i class="fa-solid fa-trash-can  fa-md"></i>
                Delete
              </button>
            </form>         
          </td>
          
        </tr>
        @endforeach
</table>
</div> 
@if(count($faq) == 0) <p class = "w-full text-center mt-5">No faq found</p> @endif
<div class="flex justfy-center p-3"
{{ $faq->links() }}</div>
    </div>
   

@endsection