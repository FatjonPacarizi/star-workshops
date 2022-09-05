<div>
    
    <table class="w-full mx-auto  ">
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
<div class=" p-3">{{ $upcomingWorkshops->links() }}</div>

</div>
