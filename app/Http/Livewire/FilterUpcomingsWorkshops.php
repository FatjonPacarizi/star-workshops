<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterUpcomingsWorkshops extends Component
{
    public $search;
    public $perpage;
    public $sortby;
    
    public function render()
    {
        return view('livewire.filter-upcomings-workshops');
    }
    public function filter(){
       
        $this->emitTo('show-upcomings-workshops','reloadUpcomingWorkshops',$this->search,$this->perpage, $this->sortby);
        
     }
}
