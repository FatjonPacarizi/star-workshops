<div>
<div class="w-full flex justify-center">
        <table class="w-full mx-4  font-thin" wire:loading.remove>
          <tr class="border-y border-gray-200 ">
            <td class="font-bold p-3 ">#</td>
            <td class="font-bold">Question</td>
            <td class="font-bold">Status</td>
            <td class="font-bold w-1/5 ">Actions</td>
          </tr>

        @php $i=1 @endphp
        @forelse ($faq as $f)
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
          <td>
          <div class=" relative flex items-center " x-data="{ open: false }">
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer w-3" @click="open = !open"></i>
  
            <ul id = "ongoingmenu" class="bg-white absolute top-0 mt-2 z-10 shadow-lg border border-gray-100 rounded-lg w-40 py-1 "
              x-show="open" @click.outside="open = false">
              <li>
                <p class="text-xs pl-3 p-2 text-gray-400 ">Manage Faq</p>
              </li>
              <li><a 
                  href="faq/{{$f->id}}/edit"
                  class="py-1 px-3 border-b block hover:bg-indigo-100 ">
                  <i class="fa-solid fa-pen mr-1 fa-sm"></i>Edit</a>
              </li>
              <form method="POST" action="faq/{{$f->id}}">
              @csrf
              @method('DELETE')
              <button class=" w-full text-left text-red-400 py-1 px-3 hover:bg-indigo-100 border-b">
                <i class="fa-solid fa-trash-can  fa-md"></i>
                Delete
              </button>
            </form>   

            </ul>
          </div>
        </td>
          
        </tr>
        @empty
    <p></p>
@endforelse
</table>
<div role="status" wire:loading>
      <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
          <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
      </svg>
      <span class="sr-only">Loading...</span>
  </div>
</div> 
<div class="m-3">
{{ $faq->links() }}</div>
    </div>

</div>
