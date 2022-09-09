<div class = "w-full">
    
    <table class="w-full mx-auto" wire:loading.remove>
        <tr class="border-y border-gray-200 font-bold">
          <td class=" p-3 w-1/3">Workshop Name</td>
          <td class=" text-sm">Limited Participants</td>
          <td>Workshop time</td>
          <td class = " w-24 text-sm">Workshop Image</td>
          <td class=" w-72 ">Actions</td>
        </tr>
        
      @unless(count($upcomingWorkshops) == 0)
      @foreach($upcomingWorkshops as $upcomingWorkshop)
      <tr class = 'border-b border-gray-200'>
        <td class="p-3 ">{{ \Illuminate\Support\Str::limit($upcomingWorkshop->name, 45, $end='...') }}</td>
        @php 
           $limited_participants = true;
           if (!$upcomingWorkshop->limited_participants)   $limited_participants = false;
        @endphp
        <td class = "w-32" ><div class="w-6  flex justify-center items-start rounded text-white text-xs  @if($limited_participants) bg-orange-500 @else bg-green-500 @endif ">@if($limited_participants) {{$upcomingWorkshop->limited_participants}} @else no @endif</div></td>

        <td ><a href="#" class = "text-blue-600"> {{\Carbon\Carbon::parse($upcomingWorkshop->time)->format('d F Y h:m') }}</a></td>
        <td><img class="object-cover rounded" alt="hero" src="{{$upcomingWorkshop->img_workshop ? asset('/storage/' . $upcomingWorkshop->img_workshop) : asset('/img/test.jpg')}}" width="50"></td>
        <td class = "flex items-center " >
          
           <a href="/workshopManage/{{$upcomingWorkshop->id}}/{{$upcomingWorkshop->limited_participants ? $upcomingWorkshop->limited_participants : 'null'}}/edit" class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
            <i class="fa-solid fa-pen fa-md"></i>
                Edit
            </a>
          <form method="POST" action="/workshopManage/{{$upcomingWorkshop->id}}">
            @csrf
            @method('DELETE')
            <input type = "hidden" name = "tab" value = "0"/>
            <button @if(count($upcomingWorkshops)==1)  onClick = "changeURL('?upcomingWorkshopsPage=1')"  @endif class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
              <i class="fa-solid fa-trash-can  fa-md"></i>
              Delete
            </button>
          </form>
          <a href={{ route('adminsuperadmin.showParticipants',$upcomingWorkshop->id)}} class="w-28 bg-sky-600 text-white p-2 pr-0 text-xs rounded flex items-center  my-2 hover:bg-sky-700">
            <i class="fa-solid fa-user fa-md"></i>
            <p class = "mx-1">Participants</p> 
            @if($upcomingWorkshop->pendingParticipants > 0)
            <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-red-400">{{$upcomingWorkshop->pendingParticipants}}</p>
            @endif  
          </a>
          
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td ></td>
        <td class = "p-5">
          No workshops Found
        </td>
      </tr>
      @endunless
</table>
<div  class = "w-full flex justify-center">
<div role="status" wire:loading>
    <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
  </div>
</div>
<div class=" p-3">{{ $upcomingWorkshops->links() }}</div>

</div>