<div id="root" class="px-10 absolute  w-full bottom-0 top-20 right-0 left-0 flex justify-between mt-5">
    <div class="w-1/2  px-3 ">
        <div class="relative">
            <div class="relative">
                <img class="inline-block w-full rounded relative"
                    src="{{$workshopPageData->img ? asset('/storage/' . $workshopPageData->img) : asset('/img/defaultWorkshopPageImg.png')}}" />
                <input type="file" name="img" wire:model.defer="img" class="text-gray-300 absolute left-0 bottom-0">
            </div>
            <input class="w-2/5 border bg-inherit rounded my-3 p-1 border-gray-300 focus:ring-0" type="text"
                name="heading" wire:model.defer="heading">
            <input class="w-2/5 border bg-inherit rounded my-3 p-1 ml-2 border-gray-300 focus:ring-0" type="text"
                name="paragraf_1" wire:model.defer="paragraf_1">
            <input class="w-2/5 border bg-inherit rounded my-3 p-1 border-gray-300 focus:ring-0" type="text"
                name="paragraf_2" wire:model.defer="paragraf_2">
            <button wire:click="updateWorkshopData"
                class="bg-sky-500 text-white px-3 py-1 ml-5 hover:bg-sky-600 rounded">save</button>
        </div>

        <div class=" flex h-2/5 mt-5">
            {{-- Categories --}}
            <div class="w-1/2  pr-3">
                <div class="h-fit  bg-white shadow-md relative rounded-xl py-2 ">
                    <div class="flex items-center justify-between">
                        <h1 class="p-2 text-black text-sm">Workshop Categories</h1>
                        <button onClick="showModal('insertCategory',-400,0)"><i
                                class="fa-solid fa-plus mr-3 text-gray-600"></i></button>
                    </div>
                    <table id="citiesTable" class="w-full mx-auto">
                        <tr class="text-gray-400 text-xs px-2">
                            <td class="w-9/12 pl-5 py-2">Category</td>
                            <td>Actions</td>
                        </tr>
                        @foreach ($categories as $category)
                        <tr class="border-t border-gray-200" style="border-top-width: 0.01em">
                            <form wire:submit.prevent="updateCategory(Object.fromEntries(new FormData($event.target)))">
                                <td class="pl-5 py-1 text-gray-600">
                                    <input class=" w-full text-slate-900 h-8 text-sm border-none border-b focus:ring-0"
                                        type="text" name="category" value='{{$category->name}}' />
                                    <input type="hidden" name="categoryId" value={{$category->id}}>
                                </td>
                                <td>
                                    <button onClick="showLoading('Category')" type="submit"><i class="fa-solid fa-floppy-disk"></i></button>
                                    <button onClick="showLoading('Category')"
                                        wire:click="deleteCategory('{{$category->id}}')"><i
                                            class="fa-solid fa-trash-can text-red-400 ml-2 fa-sm"></i></button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </table>
                    <div id="insertCategory" class="hidden absolute -top-full z-40">
                        <div
                            class="flex justify-start w-full items-center p-3 my-2 bg-white shadow rounded-md relative">
                            <button onClick="showModal('insertCategory',20,-400)" type="button"
                                class="absolute right-3 top-3 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 flex items-center justify-center h-8 w-8 "
                                data-dismiss-target="#toast-success" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <form wire:submit.prevent="insertCategory(Object.fromEntries(new FormData($event.target)))">
                                <p class="py-1 ">Insert Category</p>
                                <input
                                    class=" w-10/12 border border-gray-400 rounded text-slate-900 h-8 text-sm focus:ring-0"
                                    type="text" name="category" />
                                <button onClick="showLoading('Category')"
                                    class="bg-sky-500 px-3 py-1 mx-auto mt-2 text-xs rounded text-white"
                                    type="submit">insert</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Types --}}
            <div class="w-1/2 max-h-full px-3">
                <div class=" bg-white shadow-md relative rounded-xl py-2">
                    <div class="flex items-center justify-between">
                        <h1 class="p-2 text-black text-sm">Workshop Types</h1>
                        <button onClick="showModal('insertType',-400,0)"><i
                                class="fa-solid fa-plus mr-3 text-gray-600"></i></button>
                    </div>
                    <table id="citiesTable" class="w-full mx-auto ">
                        <tr class="text-gray-400 text-xs px-2">
                            <td class="w-9/12 pl-5 py-2">Type</td>
                            <td>Actions</td>
                        </tr>
                        @foreach ($types as $type)
                        <tr class="border-t border-gray-200" style="border-top-width: 0.01em">
                            <form wire:submit.prevent="updateType(Object.fromEntries(new FormData($event.target)))">
                                <td class="pl-5 py-1 text-gray-600">
                                    <input class=" w-full text-slate-900 h-8 text-sm border-none border-b focus:ring-0"
                                        type="text" name="type" value='{{$type->name}}' />
                                    <input type="hidden" name="typeId" value={{$type->id}}>
                                </td>
                                <td>
                                    <button onClick="showLoading('Type')" type="submit"><i class="fa-solid fa-floppy-disk"></i></button>
                                    <button onClick="showLoading('Type')" wire:click="deleteType('{{$type->id}}')"><i
                                            class="fa-solid fa-trash-can text-red-400 ml-2 fa-sm"></i></button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </table>
                    <div id="insertType" class="hidden absolute -top-full z-40">
                        <div
                            class="flex justify-start w-full items-center p-3 my-2 bg-white shadow rounded-md relative">
                            <button onClick="showModal('insertType',20,-400)" type="button"
                                class="absolute right-3 top-3 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 flex items-center justify-center h-8 w-8 "
                                data-dismiss-target="#toast-success" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <form wire:submit.prevent="insertType(Object.fromEntries(new FormData($event.target)))">
                                <p class="py-1 ">Insert Type</p>
                                <input
                                    class=" w-10/12 border border-gray-400 rounded text-slate-900 h-8 text-sm focus:ring-0"
                                    type="text" name="type" />
                                <button class="bg-sky-500 px-3 py-1 mx-auto mt-2 text-xs rounded text-white"
                                    type="submit">insert</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    {{-- Countries --}}
    <div class="w-1/2  px-3">
        <div class="bg-white shadow-md relative rounded-xl py-2 ">
            <div class="flex items-center justify-between">
                <h1 class="p-2 text-black text-sm">Workshop countries</h1>
                <button onClick="showModal('insertCountry',-600,0)"><i
                        class="fa-solid fa-plus mr-3 text-gray-600"></i></button>
            </div>
            @livewire('workshop.settings.edit-country')
            <div id="insertCountry" class="hidden w-full absolute -top-full z-40">
                @livewire('workshop.settings.insert-country')
            </div>
        </div>
        {{-- Cities --}}
        <div class=" bg-white shadow-md relative rounded-xl py-2 mt-5">
            <div class="flex items-center justify-between">
                <h1 class="p-2 text-black text-sm">Workshop Cities</h1>
                <button onClick="showModal('insertCity',-100,0)"><i
                        class="fa-solid fa-plus mr-3 text-gray-600"></i></button>
            </div>
            @livewire('workshop.settings.edit-city')
            <div id="insertCity" class="hidden w-full absolute -top-full z-40">
                @livewire('workshop.settings.insert-city')
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('countryEvent', event => {
           document.getElementById("CountryLoading").style.display = "none";

        });
        window.addEventListener('cityEvent', event => {
           document.getElementById("CityLoading").style.display = "none";
           $("#root").load(window.location.href + " #root" );
        });
        window.addEventListener('typeEvent', event => {
           document.getElementById("TypeLoading").style.display = "none";

        });
        window.addEventListener('categoryEvent', event => {
           document.getElementById("CategoryLoading").style.display = "none";

        });
        function showModal(id,from, to){
            document.getElementById(id).style.display = "block";
            $("#"+id).css({
                top: from
              }).animate({
                top:to
              }, "slow");

              if(to<0)  document.getElementById(id).style.display = "none";
        }
        
    </script>
    <div role="status" class="absolute -top-10 right-10" wire:loading>
        <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
            <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
        </svg>
    </div>
</div>