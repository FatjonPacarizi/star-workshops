<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Workshop;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ShowUpcomingWorkshopsManage extends Component
{
  
    use WithPagination;
    public $search;
    protected $listeners = ['reloadUpcomingWorkshops'];
    public $perpage;
    public $sortby;
    
   
    public function render()
    {
            $page = 8;
            if($this->perpage != null) $page =  $this->perpage;

            $sort = "DESC";
            if($this->sortby != null) $sort =  $this->sortby;
          
          $currentTime = Carbon::now('Europe/Tirane');
  
          if(request()->user()->user_status == 'superadmin'){
            
             
            $upcomingWorkshops = Workshop::whereNull("workshops.deleted_at")
            ->orderBy('id', $sort)
            ->whereNull('workshop_endTime'); 
              if($this->search != null) 
               $upcomingWorkshops = $upcomingWorkshops->where('workshops.name','like','%'.$this->search.'%');

               $upcomingWorkshops = $upcomingWorkshops->paginate($page);

          }
          else{
             
              $myID = Auth::id();

              $upcomingWorkshops = Workshop::whereNull("workshops.deleted_at")
              ->orderBy('id', $sort)
              ->whereNull('workshop_endTime')
              ->where("workshops.author", "=", $myID); 
  
              if($this->search != null) 
              $upcomingWorkshops = $upcomingWorkshops->where('workshops.name','like','%'.$this->search.'%');

              $upcomingWorkshops = $upcomingWorkshops->paginate($page);
          }
  
        

        return view('livewire.show-upcoming-workshops-manage',['upcomingWorkshops'=>$upcomingWorkshops]);
    }
    public function reloadUpcomingWorkshops($search,$perpage,$sortby){
        $this->search = $search;
        $this->perpage = $perpage;
        $this->sortby = $sortby;
    }
}
