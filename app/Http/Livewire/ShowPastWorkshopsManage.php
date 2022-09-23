<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Workshop;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ShowPastWorkshopsManage extends Component
{
    
    use WithPagination;
    public $search;
    protected $listeners = ['reloadPastsWorkshops','$refresh'];
    public $perpage;
    public $sortby;
    


    public function render()
    {
            $page = 8;
            if($this->perpage != null) $page =  $this->perpage;

            $sort = "DESC";
            if($this->sortby != null) $sort =  $this->sortby;
            
          if(request()->user()->user_status == 'superadmin'){
                      
              $pastsWorkshops = Workshop::whereNull("workshops.deleted_at")
              ->orderBy('workshop_endTime', $sort)
              ->whereNotNull('workshop_endTime');
  
              
              if($this->search != null) 
               $pastsWorkshops = $pastsWorkshops->where('workshops.name','like','%'.$this->search.'%');

               $pastsWorkshops = $pastsWorkshops->paginate($page);
          }
          else{
             
              $myID = Auth::id();
              $pastsWorkshops = Workshop::whereNull("workshops.deleted_at")
              ->orderBy('workshop_endTime', $sort)
              ->whereNotNull('workshop_endTime')
              ->where("workshops.author", "=", $myID); 
                
              if($this->search != null) 
               $pastsWorkshops = $pastsWorkshops->where('workshops.name','like','%'.$this->search.'%');

               $pastsWorkshops = $pastsWorkshops->paginate($page);
          }
  
         $workshops1 = Workshop::orderBy('deleted_at','asc')->onlyTrashed()->paginate(8,['*'], 'deletedWorkshopsPage');

        return view('livewire.show-past-workshops-manage',['pastsWorkshops'=>$pastsWorkshops, 'workshops1'=>$workshops1]);
    }
    public function reloadPastsWorkshops($search,$perpage,$sortby){
        $this->search = $search;
        $this->perpage = $perpage;
        $this->sortby = $sortby;
    }
    public function endWorkshop($id){
        $workshop_endTime = Carbon::now()->timezone('Europe/Tirane')->toDateTimeString();
        $workshop = Workshop::find($id);
    
        if($workshop->workshop_endTime != null) $workshop_endTime = null;
          
        Workshop::where('id',$id)->update(['workshop_endTime' => $workshop_endTime]);

        $this->emitTo('show-ongoing-workshops-manage', '$refresh');
      }

      public function deleteWorkshop($id){
        Workshop::where('id',$id)->update(['deleted_from_id' => Auth::id()]);
        Workshop::find($id)->delete();

        $this->emitTo('showsafeworkshops', '$refresh');
    }
}
