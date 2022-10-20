<div class="lg:w-full w-[1000px] py-4">
  <h1 class="p-3 text-black font-medium ml-2 ">Manage workshops</h1>
    <table class="w-full mx-auto" wire:loading.remove>
      <tr class="text-gray-400 text-xs">
        <td class=" p-3 w-1/2">Workshop</td>
        <td class="w-1/6">Limited Participants</td>
        <td style = "width:18%;">Workshop time</td>
        <td>Actions</td>
        <td>Participants</td>
  
      </tr>
  
      @unless(count($pastsWorkshops) == 0)
      @foreach($pastsWorkshops as $pastsWorkshop)
      <tr class='border-t border-gray-200' style="border-top-width: 0.01em">
        <td>
          <div class="w-full h-full flex items-center pl-5 p-2">
            <img class="w-10 rounded" alt="hero"
              src="{{$pastsWorkshop->img_workshop ? asset('/storage/' . $pastsWorkshop->img_workshop) : asset('/img/test.jpg')}}" />
            <div class="ml-3 ">
              <h1 class="text-black">{{\Illuminate\Support\Str::limit($pastsWorkshop->name, 45, $end='...') }}</h1>
              <p class="text-xs text-gray-500">{{$pastsWorkshop->country->name}}, {{$pastsWorkshop->city->name}}</p>
            </div>
          </div>
        </td>
        <td class="w-32">
          <div
            class="w-16 px-2 py-1 bg-gradient-to-r @if($pastsWorkshop->limited_participants) from-orange-300 to-orange-500 @else from-lime-500 to-green-500 @endif  flex justify-center items-center rounded-lg text-white text-xs font-medium">
            @if($pastsWorkshop->limited_participants) {{$pastsWorkshop->limited_participants}} @else unlimited @endif
          </div>
        </td>
  
        <td class="text-xs text-gray-500 ">
          {{\Carbon\Carbon::parse($pastsWorkshop->time)->format('d F Y h:m') }}
        </td>
        <td>
          <div class="relative flex items-center" x-data="{ open: false }">
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer w-3" @click="open = !open"></i>

            <ul id = "pastmenu" class="bg-white absolute top-0 mt-2 z-10 shadow-lg rounded-lg border border-gray-100 w-40 py-1 " x-show="open"
              @click.outside="open = false">
              <li>
                <p class="text-xs pl-3 py-2 text-gray-400 ">Manage Workshop</p>
              </li>
              <li><a
                  href="/workshops/manage/{{$pastsWorkshop->id}}/edit"
                  class="py-1 px-3 border-b block hover:bg-indigo-100 ">
                  <i class="fa-solid fa-pen mr-1 fa-sm"></i>Edit</a>
              <li>
                <button wire:click = 'deleteWorkshop({{$pastsWorkshop->id}})'  @click="open = !open" class="w-full text-left text-red-400 py-1 px-3 hover:bg-indigo-100 border-b">
                  <i class="fa-solid fa-trash-can   fa-sm"></i> Delete
                </button>
              </li>
              <li>
              <a class="w-full text-left py-1 px-3 block hover:bg-indigo-100 border-b text-blue-900 " href={{ route('adminsuperadmin.showPDF',$pastsWorkshop->id)}}>
                <i class="fa-regular fa-file-pdf"></i> Generate PDF</a>
            </li>
            <li class = "flex items-center px-3 py-1 border-b hover:bg-indigo-100">
              <i class="fa-regular fa-calendar-check mr-1.5 text-red-400"></i>
              <input wire:change = 'endWorkshop({{$pastsWorkshop->id}})' type ="checkbox"   @click="open = !open" @if($pastsWorkshop->workshop_endTime != null) checked  @endif class = "mr-2 rounded"/>
              Ended
            </li>
              <li>
                <a class="py-1 px-3 block hover:bg-indigo-100 " href={{
                  route('adminsuperadmin.showUser',$pastsWorkshop->id) }}>
                  <i class="fa-solid fa-user-plus text-gray-400 fa-sm"></i> Add Participant
                </a>
              </li>
              <li>
              <a class="py-1 px-3 block hover:bg-indigo-100 " href="/workshops/manage/streaminglive/{{$pastsWorkshop->id}}">
              <i class="fa-solid fa-video text-gray-400 fa-sm"></i> Streaming</a>
            </li>
            </ul>
          </div>
        </td>
        <td>
          <a href={{ route('adminsuperadmin.showParticipants',$pastsWorkshop)}} class="w-fit px-3 py-2
            text-left flex items-center relative ">
            <i class="fa-solid fa-user fa-md text-gray-400"></i>
            @if(count($pastsWorkshop->pendingParticipants) > 0)
            <p
              class="w-4 h-4 text-xs text-white absolute top-0 right-0 flex justify-center items-center rounded-full bg-red-400">
              {{count($pastsWorkshop->pendingParticipants)}}</p>
            @endif
          </a>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td></td>
        <td class="p-5">
          No workshops Found
        </td>
      </tr>
      @endunless
    </table>
    <div class="w-full flex justify-center">
      <div role="status" wire:loading>
        <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
          viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor" />
          <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class=" p-3">{{ $pastsWorkshops->links() }}</div>
  
  </div>
  <script>
    function hidepastmenu(){
      var x = document.getElementById("pastmenu").style.display = "none";
    }
  </script>