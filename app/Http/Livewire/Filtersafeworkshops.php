<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Filtersafeworkshops extends Component
{
    public $search;
    public $perpage;
    public $sortby;
   
    public function render()
    {
        return view('livewire.filtersafeworkshops');
    }

    public function filter(){

        $this->emitTo('showsafeworkshops','reloadSafeworkshops',$this->search,$this->perpage, $this->sortby);
    }
}
