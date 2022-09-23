<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterStreaming extends Component
{

    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        return view('livewire.filter-streaming');
    }

    public function filter(){

        $this->emitTo('show-streaming','reloadStreaming',$this->search,$this->perpage, $this->sortby);
    }
}
