<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterPastsWorkshops extends Component
{
    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        return view('livewire.filter-pasts-workshops');
    }
    public function filter(){
       
        $this->emitTo('show-pasts-workshops','reloadPastsWorkshops',$this->search,$this->perpage, $this->sortby);
        
     }
}