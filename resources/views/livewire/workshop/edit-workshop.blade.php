<div class="w-full  p-6 px-10 flex ">
    <script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
  <div class="w-full bg-white   shadow-md rounded-xl  ">
    <div class="w-full flex items-center  border-b border-gray-200 mb-4">
      <a href="{{ route('adminsuperadmin.showManageWorkshops') }}"><i class="fa-solid fa-arrow-left mx-4"></i></a>
      <h1 class="p-3 text-black  font-medium  ">Workshop Edit</h1>
    </div>
    <form method="POST" wire:submit.prevent="update" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Name</label>
        <div class="w-full mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Name" wire:model.defer="name"
            />
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Participants Limit</label>
        <div class="w-full mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Limit participants"
            name="limited_participants" wire:model.defer="limited_participants" />
          @error('limited_participants')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mb-6 flex items-center" wire:ignore>
        <label class="w-28 text-sm mx-5" for="">Description</label>
        <textarea type="text" id = "description"  name = "description" wire:model.defer="description"  class="border border-gray-200 rounded p-1 w-full ">{{$workshop->description}}</textarea>
      </div>
      @push('scripts')
      <script>
        initTiny();
        function initTiny(){
            tinymce.init({
            selector: '#description', // Replace this CSS selector to match the placeholder element for TinyMCE
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
                        @this.set('description', editor.getContent());
                    });
                }
            });
        }
        window.addEventListener('workshopUpdate', event => {
            initTiny();
        })
      </script>
       @endpush

      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Country</label>
        <div class="w-full mx-5">
          <select class="w-full rounded border border-gray-200 p-1" name='country_id' wire:model.defer="country_id">
            @foreach($countries as $country)
            <option value =
              '{{$country->id}}'>{{$country->name}}</option>
            @endforeach
          </select>
          @error('country_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">City</label>
        <div class="w-full mx-5">
          <select class="w-full rounded border border-gray-200 p-1" name='city_id' wire:model.defer="city_id">
            @foreach($cities as $city)
            <option value = '{{$city->id}}'>{{$city->name}}
            </option>
            @endforeach
          </select>
          @error('city_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Type</label>
        <div class="w-full mx-5">
          <select class="w-full  rounded border border-gray-200 p-1" name='type_id' wire:model.defer="type_id">
            @foreach($types as $type)
            <option @if($workshop->type_id == $type->id) selected @endif value = '{{$type->id}}'>{{$type->name}}
            </option>
            @endforeach
          </select>
          @error('type_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5 ">Categories</label>
        <div class="w-full mx-5">
          <select class="w-full rounded border border-gray-200 p-1" name='category_id' wire:model.defer="category_id">
            @foreach($categories as $category)
            <option @if($workshop->category_id == $category->id) selected @endif value =
              '{{$category->id}}'>{{$category->name}}</option>
            @endforeach
          </select>
          @error('category_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5">Time</label>
        <div class="mx-1">
          <input type="datetime-local" name="time" wire:model.defer="time" class="border border-gray-300 rounded p-1 "/>
          @error('time')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        @if ($workshop->workshop_endTime != null)
         <p class = "ml-3 text-red-500">Ended at : {{$workshop->workshop_endTime}}</p> 
        @endif
      </div>
      <div class="mb-6 flex items-center">
        <label class="w-28 text-sm mx-5">Link</label>
        <div class="w-full mx-5">
          <input type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Link" name="filedlink" wire:model.defer="filedlink"/>
          @error('filedlink')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="mb-6  flex items-center">
        <label class="w-28 text-sm mx-5">Image</label>
        <input type="file" wire:model="img_workshop" name="img_workshop" />

        <img class="object-cover rounded" alt="hero"
          src="{{$workshop->img_workshop ? asset('/storage/' . $workshop->img_workshop) : asset('/img/test.jpg')}}"
          width="100">
      </div>
      <div class="w-full p-6 flex items-center justify-end border-t border-gray-200">
        <a href="/workshops/manage" class="text-gray-400 mx-10" wire:loading.remove> Cancel </a>
        <div role="status" class = "w-20" wire:loading>
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
        </div>
        <button type = "submit"  class="w-40 rounded py-2 px-4 bg-sky-500 text-white hover:bg-sky-600"  >Update Workshop</button>
      </div>
    </form>
  </div>
</div>