<div class="w-full p-10">
    <div class="w-full bg-white shadow-md  rounded-xl">
        <div class="flex items-center border-b border-gray-200">
        <a href="{{ route('superadmin.showlandings') }}"><i class="fa-solid fa-arrow-left mx-4"></i></a>
       <h1 class="p-3 text-black font-medium ml-2 ">Section 4 Edit</h1>
    </div>
<div class="w-full  p-6 px-10 flex ">
    <div class="w-full bg-white">
      <div class="w-full flex items-center mb-4">
      </div>
        @if (session('status'))
        <h6>{{ session('status') }}</h6>
        @endif

        <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Heading</label>
                <div class="w-full mx-5">
                    <input type="text" name="heading" wire:model.defer="heading" class="border border-gray-200 rounded p-1 w-full "/>
                    @error('heading')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6 flex items-center" wire:ignore>
                <label class="w-28 text-sm mx-5" for="">Paragraf</label>
                <div class="w-full mx-5">
                    <textarea name="paragraf_1" wire:model.defer="paragraf_1" id="paragraf_1s4" class="border border-gray-200 rounded p-1 w-full "></textarea>          
                    @error('paragraf_1')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mb-6 flex items-center">
                <label class="w-28 text-sm mx-5" for="">Button Link</label>
                <div class="w-full mx-5">
                    <input type="text" name="button" wire:model.defer="button" class="border border-gray-200 rounded p-1 w-full ">
                    @error('button')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
        
            <div class="mb-6  flex items-center">
                <label class="w-28 text-sm mx-5">Image</label>
                <div class="w-full mx-9">
                    <input type="file" name="image" wire:model.defer="img_1"/>
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                 </div>
                <img class="object-cover mx-5 rounded" alt="Image" src="{{$section4->img_1 ? asset('/storage/' . $section4->img_1) : asset('/img/section4_defaultimg.png')}}" width="100">
            </div>
            
            <div class="w-full p-4 flex justify-end">

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

                <button wire:click.prevent = 'update({{$section4->id}})' class="rounded-lg py-2 px-6 text-blue-400 border-2 border-blue-400 hover:bg-blue-400 hover:text-white hover:border-blue-400 duration-300">Update </button>
            </div>
    </div>
    <div id = "flash-msg4" class="absolute top-1 -right-full z-40" >
        <div class = "flex justify-start w-72 items-center p-3 my-2 bg-white shadow rounded-l-md">
          <i class="fa-solid fa-check rounded-full w-8 h-8 flex items-center justify-center bg-green-400 text-white mr-5"></i>
          <p>Section 4 Updated</p>
          <button onClick = "animateFlashMsg(20,-400,true)" type="button" class="ml-auto text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 flex items-center justify-center h-8 w-8 " data-dismiss-target="#toast-success" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </div>
</div>
@push('scripts')
    <script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
      <script>
        initTiny();
        function initTiny(){
            tinymce.init({
            selector: '#paragraf_1s4', // Replace this CSS selector to match the placeholder element for TinyMCE
            height: 300,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | help',
            menubar: 'file edit view insert format tools table help',
            setup: function (editor) {
                    editor.on('init change', function () {
                        editor.save();
                    });
                    editor.on('change', function (e) {
                        @this.set('paragraf_1', editor.getContent());
                    });
                }
            });
        }
        var closeTimeout;
                window.addEventListener('section4Update', event => {
                    initTiny();
                    animateFlashMsg(-400,20,false);
                    closeTimeout = window.setTimeout( 
                    function() {
                    animateFlashMsg(20,-400,false);
                    }, 2500);
                });

                function animateFlashMsg(from, to, closedByBtn){
                $("#flash-msg4").css({
                        right: from
                    }).animate({
                        right:to
                    }, "slow");
                if(closedByBtn) clearTimeout(closeTimeout);
                }
      </script>
@endpush
</div>