<x-app-layout>
    <div class="p-6 flex flex-col  items-center">
  
      <div class="w-full bg-white border border-gray-200 rounded">
              <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
              <h1 class = "p-3 text-slate-900">User Managment</h1>
              <a href="/dashboard" class="p-3 text-gray-400"> Cancel</a>
            </div>
              <div class="flex flex-col items-center">
            <form method="POST" action="/appInfos1/{{$informations[0]->id}}/edit" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                  <label for="company" class="inline-block text-lg mb-2">App Name</label>
                  <input type="text" class="border border-gray-200 rounded p-2 w-full" name="app_name"
                    value="{{$informations[0]->app_name}}" />
          
                  @error('app_name')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>
          
            
                <div class="mb-6">
                  <label for="logo" class="inline-block text-lg mb-2">
                    App Logo
                  </label>
                  <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo_name" />
          
                  <img class="w-48 mr-6 mb-6"
                    src="{{$informations[0]->logo_name ? asset('storage/' . $informations[0]->logo_name) : asset('/img/23.png')}}" alt="" />
          
                  @error('logo_name')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>
          
             
          
                <div class="mb-6">
                  <button class="bg-sky-500 text-white rounded py-2 px-4 hover:bg-black">
                    Update
                  </button>
          
                 
                </div>
              </form>
            </div>
          </div>
  
    </div>
     
  </x-app-layout>
  