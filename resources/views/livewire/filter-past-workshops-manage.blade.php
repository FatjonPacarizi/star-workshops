<div class = "flex justify-end">
<div class = "flex justify-end items-end flex-wrap md:flex-nowrap w-full xl:w-1/2 ">
    <div class="w-full md:w-2/3 flex items-center rounded-xl border border-gray-200 mb-3 px-2  bg-white"><i class="fa-sharp fa-solid fa-magnifying-glass text-gray-300 fa-sm"></i> <input type="text" wire:model="search" wire:keyup.debounce = "filter" class=" w-full text-slate-900 h-8 text-xs border-none  focus:ring-0" placeholder="Type to Search"  /></div>
    <div class = "flex flex-col items-center w-1/3 md:w-fit">
    <select wire:model="perpage" wire:change = "filter" class="w-full text-slate-900 rounded-xl mb-3 text-xs border-b border-gray-200 ml-4  focus:ring-0" >
        <option value = "8">8</option>
        <option value = "15">15</option>
        <option value = "20">20</option>
        <option value = "25">25</option>
    </select>
    </div>
    <div class = "flex flex-col items-center w-1/3  md:w-fit mx-2">
        <select  wire:model="sortby"  wire:change = "filter" class="w-full text-slate-900 rounded-xl mb-3 text-xs border-b border-gray-200 ml-4 focus:ring-0 " >
            <option value = "DESC">DESC</option>
            <option value = "ASC">ASC</option>
        </select>
        </div>
</div>
</div>