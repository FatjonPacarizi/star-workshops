<div class="w-full  p-6 px-10 flex ">
    <div class="w-full bg-white   shadow-md rounded-xl  ">
      <div class="w-full flex items-center  border-b border-gray-200 mb-4">
        <h1 class="p-3 text-black  font-medium  ">App infos Edit</h1>
      </div>
        @if (session('status'))
        <h6>{{ session('status') }}</h6>
        @endif
            <form method="POST"  wire:submit.prevent="update" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">App Name</label>
                <div class="w-full mx-5">
                    <input type="text" name="app_name" wire:model.defer = "app_name" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('app_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Facebook</label>
                <div class="w-full mx-5">
                    <input type="text" name="facebook" wire:model.defer = "facebook" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('facebook')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Instagram</label>
                <div class="w-full mx-5">
                    <input type="text" name="instagram" wire:model.defer = "instagram" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('instagram')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Twitter</label>
                <div class="w-full mx-5">
                    <input type="text" name="twitter" wire:model.defer = "twitter" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('twitter')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Linkedin</label>
                <div class="w-full mx-5">
                    <input type="text" name="linkedin" wire:model.defer = "linkedin" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('linkedin')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6  flex items-center">
                <label class="w-28 text-sm mx-5">App Logo</label>
                <div class="w-full mx-9">
                    <input type="file" name="logo_name" wire:model.defer = "logo_name"/>
                    @error('logo_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                 </div>
                <img class="object-cover mx-5 rounded" alt="Image" src="{{$informations->logo_name ? asset('/storage/' . $informations->logo_name) : asset('/img/Logo.png')}}" width="100">
            </div>
            <div class="w-full p-2 flex justify-end border-t border-gray-200">
                <button type="submit" class="rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600">Update App</button>
            </div>
        </form>
    </div>
    <script>
         var closeTimeout;
        window.addEventListener('appinfosUpdate', event => {
            animateFlashMsg(-400,20,false);
            closeTimeout = window.setTimeout( 
            function() {
              animateFlashMsg(20,-400,false);
            }, 2500);
        });

        function animateFlashMsg(from, to, closedByBtn){
          $("#flash-msg").css({
                right: from
              }).animate({
                right:to
              }, "slow");
          if(closedByBtn) clearTimeout(closeTimeout);
        }
      </script>
       <div id = "flash-msg" class="absolute top-1 -right-full z-40" >
        <div class = "flex justify-start w-72 items-center p-3 my-2 bg-white shadow rounded-l-md">
          <i class="fa-solid fa-check rounded-full w-8 h-8 flex items-center justify-center bg-green-400 text-white mr-5"></i>
          <p>App Infos updated</p>
          <button onClick = "animateFlashMsg(20,-400,true)" type="button" class="ml-auto text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 flex items-center justify-center h-8 w-8 " data-dismiss-target="#toast-success" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </div>
</div>
