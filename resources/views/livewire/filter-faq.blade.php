<div class = "flex items-end">
    <input type="text" wire:model="search" wire:keyup.debounce = "filter" class="text-slate-900 h-8 rounded my-3 text-xs border-b border-gray-400 " placeholder="Type to Search"  />
   
    
    <div class = "flex flex-col items-center">
    <p class = "text-xs">Per page</p>
    <select wire:model="perpage" wire:change = "filter" class="text-slate-900 rounded my-3 text-xs border-b border-gray-400 ml-4" >
        <option value = "8">8</option>
        <option value = "15">15</option>
        <option value = "20">20</option>
        <option value = "25">25</option>
    </select>
    </div>

    <div class = "flex flex-col items-center">
        <p class = "text-xs">Sort By</p>
        <select wire:model="sortby" wire:change = "filter" class="text-slate-900 rounded my-3 text-xs border-b border-gray-400 ml-4" >
            <option value = "ASC">ASC</option>
            <option value = "DESC">DESC</option>
        </select>
    </div>

</div>
