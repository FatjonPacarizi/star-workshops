<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterFaq  extends Component
{
    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        return view('livewire.filter-faq');
    }

    public function filter(){

        $this->emitTo('show-faq','reloadFaq',$this->search,$this->perpage, $this->sortby);
    }
}
