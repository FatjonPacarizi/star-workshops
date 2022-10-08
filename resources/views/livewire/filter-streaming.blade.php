<div class = "w-2/3   flex justify-end items-end ">
    <div class=" flex w-2/3 items-center rounded-xl border border-gray-200 my-3 px-2  bg-white"><i class="fa-sharp fa-solid fa-magnifying-glass text-gray-300 fa-sm"></i> <input type="text" wire:model="search" wire:keyup.debounce = "filter" class=" w-full text-slate-900 h-8 text-xs border-none  focus:ring-0" placeholder="Type to Search"  /></div>
    <div class = "flex flex-col items-center">
    <select wire:model="perpage" wire:change = "filter" class="text-slate-900 rounded-xl my-3 text-xs border-b border-gray-200 ml-4  focus:ring-0 " >
        <option value = "8">8</option>
        <option value = "15">15</option>
        <option value = "20">20</option>
        <option value = "25">25</option>
    </select>
    </div>
    <div class = "flex flex-col items-center">
        <select wire:model="sortby" wire:change = "filter" class="text-slate-900 rounded-xl my-3 text-xs border-b border-gray-100 ml-4 focus:ring-0 " >
            <option value = "ASC">ASC</option>
            <option value = "DESC">DESC</option>
        </select>
    </div>
</div>
