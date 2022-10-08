<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterOngoingWorkshopsManage extends Component
{
    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        return view('livewire.filter-ongoing-workshops-manage');
    }
    public function filter(){
       
        $this->emitTo('show-ongoing-workshops-manage','reloadOngoingWorkshops',$this->search,$this->perpage, $this->sortby);
        
     }
}
