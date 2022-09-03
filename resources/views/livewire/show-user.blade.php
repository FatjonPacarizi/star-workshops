<div>
<div class="w-full flex justify-center">
            <table class="w-full mx-4">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold">Name</td>
                <td class="font-bold p-3">User Status </td>
                <td class="font-bold">Verified</td>
                <td class="font-bold">Email</td>
                <td class="font-bold  w-1/5">Actions</td>
              </tr>
            @forelse ($users as $user)
            <tr @if($user->user_status == 'superadmin') class = 'bg-gray-100' @endif>
              <td class = "w-1/6">{{$user->name}}</td>
              <td class = "p-3" >{{$user->user_status}}</td>
              <td class = "w-1/5"><div class="w-6   bg-red-500 flex justify-center items-center rounded text-white text-xs">no</div></td>
              <td ><a href="#" class = "text-blue-600"> {{$user->email}}</a></td>
              <td class = "flex items-center" >
                 <a href="/usersManager/{{$user->id}}/edit" class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-sky-600">
                  <i class="fa-solid fa-pen mr-1  fa-md"></i>
                  Edit
                  </a>
                <form method="POST" action="/usersManager/{{$user->id}}">
                  @csrf
                  @method('DELETE')
                  <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                    <i class="fa-solid fa-trash-can   fa-md"></i> 
                                         Delete
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td >
               
              </td>
            </tr>
            @endforelse
    </table>
  </div>
            
  <div class="m-3">
{{$users->links()}}</div>
        </div>
</div>
