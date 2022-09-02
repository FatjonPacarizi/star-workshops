<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterNews extends Component
{
    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        return view('livewire.filter-news');
    }

    public function filter(){
   
        $this->emitTo('show-news','reloadNews',$this->search,$this->perpage, $this->sortby);
    }
}
