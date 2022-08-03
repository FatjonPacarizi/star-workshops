<x-app-layout>
  <div class="p-6 flex flex-col  items-center">

    <div class="w-full bg-white border border-gray-200 rounded">
            <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">

            <h1 class = "p-3 text-slate-900">User Managment</h1>
            <a href="/usersManager" class="p-3 text-gray-400"> Cancel </a>
          </div>
            
            <form method="POST" action="/usersManager/{{$user->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6 flex items-center">
                  <label  class="w-28 text-sm mx-5">Name</label>
                  <input type="text" class="border border-gray-200 rounded p-1 w-full mx-5" placeholder="Name" name="name"
                    value="{{$user->name}}" />
          
                  @error('name')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>
          
                <div class="mb-6  flex items-center">
                  <label  class="w-28 text-sm mx-5">Email</label>
                  <input type="text" class="border border-gray-200 rounded p-1 w-full mx-5" name="email"
                    placeholder="Email" value="{{$user->email}}" />
          
                  @error('email')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>
          
                <div class="mb-6  flex items-center">
                  <label class="w-28 text-sm mx-5 ">User Status</label>
                  @if($user->user_status != 'superadmin')
                  <select class = "w-full mx-5 rounded border border-gray-200 p-1" name = 'user_status' >
                      <option value = 'user' @if($user->user_status == 'user') selected @endif>User</option>
                      <option value = 'admin' @if($user->user_status == 'admin') selected @endif>Admin</option>
                     
                  </select>
                  @else
                  <label class = "mx-2">Super Admin</label>
                  @endif
                  @error('user_status')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>
          
              
          
                <div class="w-full p-2 flex justify-end border-t border-gray-200">
                  <button class="rounded py-2 px-4 bg-blue-800 text-white hover:bg-blue-900">Update User</button>
          
                 
                </div>
              </form>
        </div>

  </div>
   
</x-app-layout>
