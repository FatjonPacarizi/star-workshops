<div class="w-full  p-6 px-5 md:px-10 flex ">
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
                <div class="mb-6 flex flex-col md:flex-row md:items-center">
                <label class="w-28 text-sm mx-5" for="">App Name</label>
                <div class="w-11/12 md:w-full mx-auto mt-2 md:mt-0 md:mx-5">
                    <input type="text" name="app_name" wire:model.defer = "app_name" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('app_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6  flex flex-col md:flex-row md:items-center">
                <label class="w-28 text-sm mx-5" for="">Facebook</label>
                <div class="w-11/12 md:w-full mx-auto mt-2 md:mt-0 md:mx-5">
                    <input type="text" name="facebook" wire:model.defer = "facebook" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('facebook')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6  flex flex-col md:flex-row md:items-center">
                <label class="w-28 text-sm mx-5" for="">Instagram</label>
                <div class="w-11/12 md:w-full mx-auto mt-2 md:mt-0 md:mx-5">
                    <input type="text" name="instagram" wire:model.defer = "instagram" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('instagram')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6  flex flex-col md:flex-row md:items-center">
                <label class="w-28 text-sm mx-5" for="">Twitter</label>
                <div class="w-11/12 md:w-full mx-auto mt-2 md:mt-0 md:mx-5">
                    <input type="text" name="twitter" wire:model.defer = "twitter" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('twitter')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6  flex flex-col md:flex-row md:items-center">
                <label class="w-28 text-sm mx-5" for="">Linkedin</label>
                <div class="w-11/12 md:w-full mx-auto mt-2 md:mt-0 md:mx-5">
                    <input type="text" name="linkedin" wire:model.defer = "linkedin" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('linkedin')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6   flex flex-col md:flex-row md:items-center">
                <label class="w-28 text-sm mx-5">App Logo</label>
                <div class="w-11/12 md:w-full mx-auto md:mx-9">
                    <input type="file" name="logo_name" wire:model.defer = "logo_name"/>
                    @error('logo_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                 </div>
                <img class="object-cover mx-5 rounded mt-5 md:mt-0" alt="Image" src="{{$informations->logo_name ? asset('/storage/' . $informations->logo_name) : asset('/img/Logo.png')}}" width="100">
            </div>
            <div class="w-full p-2 flex justify-end items-center border-t border-gray-200">
                <div role="status" class = "w-20" wire:loading>
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                </div>
                <button type="submit" class="rounded py-2 px-4 bg-sky-500 text-white text-sm md:text-md hover:bg-sky-600">Update App</button>
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
