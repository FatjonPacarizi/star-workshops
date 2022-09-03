<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterFaq extends Component
{

    public $search;
    public $sortbystatus;
    public $perpage;
    public $sortby;

    public function render()
    {
        return view('livewire.filter-faq');
    }

    public function filter(){

        $this->emitTo('show-faq','reloadFaq',$this->search,$this->sortbystatus,$this->perpage,$this->sortby);
    }
}
