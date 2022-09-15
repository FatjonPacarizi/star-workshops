<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterUpcomingWorkshopsManage extends Component
{
    
    public $search;
    public $perpage;
    public $sortby;
    
    public function render()
    {
        return view('livewire.filter-upcoming-workshops-manage');
    }
    public function filter(){
       
        $this->emitTo('show-upcoming-workshops-manage','reloadUpcomingWorkshops',$this->search,$this->perpage, $this->sortby);
        
     }
}
