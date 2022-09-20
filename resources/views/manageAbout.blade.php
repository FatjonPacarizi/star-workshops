<x-app-layout>
  <div class="p-6 flex flex-col  items-center">
    <div class="w-full bg-white border pb-4">
            <h1 class = "p-3 text-slate-900 border-b border-gray-200 mb-4 ">User Managment</h1>
             <div class="w-full flex justify-center">
            <table class="w-full mx-4">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3">User Status </td>
                <td class="font-bold">Email</td>
                <td class="font-bold">Email</td>
                <td class="font-bold text-center w-1/9">Actions</td>
              </tr>
            @unless($users->isEmpty())
            @foreach($users as $user)
            <tr @if($user->user_status == 'superadmin') class = 'bg-gray-100' @endif>
              <td class = "p-3" >{{$user->user_status}}</td>
              <td >{{$user->name}}</td>
              <td ><a href="#" class = "text-blue-600"> {{$user->email}}</a></td>
              <td class = "flex justify-center items-center" >
                 <a href="/usersManager/{{$user->id}}/edit" class="bg-sky-500 text-white px-4 py-1 text-sm rounded m-3">
                    Edit
                  </a>
                <form method="POST" action="/usersManager/{{$user->id}}">
                  @csrf
                  @method('DELETE')
                  <button class="bg-red-500 text-white px-4 py-1 text-sm rounded"> Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td >
                <p class="text-center">No users Found</p>
              </td>
            </tr>
            @endunless
    </table>
  </div>
        </div>
      </div>
</x-app-layout>
