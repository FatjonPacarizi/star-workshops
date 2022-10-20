<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Workshop;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShowOngoingWorkshopsManage extends Component
{

    use WithPagination;
    public $search;
    protected $listeners = ['reloadOngoingWorkshops','$refresh'];
    public $perpage;
    public $sortby;

    public function render()
    {

        $page = 8;
        if($this->perpage != null) $page =  $this->perpage;

        $sort = "DESC";
        if($this->sortby != null) $sort =  $this->sortby;
      
      if(request()->user()->user_status == 'superadmin'){
        
         
        $ongoingWorkshops = Workshop::whereNull("workshops.deleted_at")
        ->orderBy('workshop_startTime', $sort)
        ->whereNotNull('workshop_startTime')
        ->whereNull('workshop_endTime'); 
          if($this->search != null) 
           $ongoingWorkshops = $ongoingWorkshops->where('workshops.name','like','%'.$this->search.'%');

           $ongoingWorkshops = $ongoingWorkshops->paginate($page);

      }
      else{
         
          $myID = Auth::id();

          $ongoingWorkshops = Workshop::whereNull("workshops.deleted_at")
          ->orderBy('id', $sort)
          ->whereNotNull('workshop_startTime')
          ->whereNull('workshop_endTime')
          ->where("workshops.author", "=", $myID); 

          if($this->search != null) 
          $ongoingWorkshops = $ongoingWorkshops->where('workshops.name','like','%'.$this->search.'%');

          $ongoingWorkshops = $ongoingWorkshops->paginate($page);
      }

    


        return view('livewire.show-ongoing-workshops-manage',['ongoingWorkshops'=>$ongoingWorkshops]);
    }

    public function reloadOngoingWorkshops($search,$perpage,$sortby){
        $this->search = $search;
        $this->perpage = $perpage;
        $this->sortby = $sortby;
    }
    public function startWorkshop($id){
        $workshop_startTime = Carbon::now()->timezone('Europe/Tirane')->toDateTimeString();
        $workshop = Workshop::find($id);
  
        if($workshop->workshop_startTime != null) $workshop_startTime = null;
       
          
        Workshop::where('id',$id)->update(['workshop_startTime' => $workshop_startTime]);

        $this->emitTo('show-upcoming-workshops-manage', '$refresh');
      }
  
    public function endWorkshop($id){
        $workshop_endTime = Carbon::now()->timezone('Europe/Tirane')->toDateTimeString();
        $workshop = Workshop::find($id);

        if($workshop->workshop_endTime != null) $workshop_endTime = null;
        
        Workshop::where('id',$id)->update(['workshop_endTime' => $workshop_endTime]);

        $this->emitTo('show-past-workshops-manage', '$refresh');
    }
    public function deleteWorkshop($id){
        Workshop::where('id',$id)->update(['deleted_from_id' => Auth::id()]);
        Workshop::find($id)->delete();

        $this->emitTo('showsafeworkshops', '$refresh');
    }

}
