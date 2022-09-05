<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterWorkshops extends Component
{
    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        return view('livewire.filter-workshops');
    }
    public function filter(){
   
        $this->emitTo('show-workshops','reloadNews',$this->search,$this->perpage, $this->sortby);
    }
}
