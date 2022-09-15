<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterPastWorkshopsManage extends Component
{
    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        return view('livewire.filter-past-workshops-manage');
    }
    public function filter(){
       
        $this->emitTo('show-past-workshops-manage','reloadPastsWorkshops',$this->search,$this->perpage, $this->sortby);
        
     }
   
}
