<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterUser extends Component
{
    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        return view('livewire.filter-user');
    }

    public function filter(){

        $this->emitTo('show-user','reloadUser',$this->search,$this->perpage,$this->sortby);
    }
}
