<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Workshop;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ShowPastsWorkshops extends Component
{
    
    use WithPagination;
    public $search;
    protected $listeners = ['reloadPastsWorkshops'];
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
            
              $pastsWorkshops = Workshop::leftJoin("workshops_users", function($join){
                  $join->on("workshops.id", "=", "workshops_users.workshop_id")
                  ->where("workshops_users.application_status", "=", 'pending');
              })
              ->leftJoin("countries", function($join){
                $join->on("workshops.country_id", "=", "countries.id");
               })
               ->leftJoin("cities", function($join){
                $join->on("workshops.city_id", "=", "cities.id");
               })
              ->select("workshops.id", "workshops.name","countries.name as countryName","cities.name as cityName","workshops.img_workshop", "workshops.limited_participants", "workshops.time")
              ->selectRaw('COUNT(workshops_users.application_status) as pendingParticipants')
              ->whereNull("workshops.deleted_at")
              ->orderBy('id', $sort)
              ->where('workshops.time','<', $currentTime)
              ->groupBy("workshops.id","workshops.name","workshops.time","workshops.limited_participants","workshops.img_workshop","countries.name","cities.name");
              
              
              if($this->search != null) 
               $pastsWorkshops = $pastsWorkshops->where('name','like','%'.$this->search.'%');

               $pastsWorkshops = $pastsWorkshops->paginate($page);

          }
          else{
             
              $myID = Auth::id();
  
  
              $pastsWorkshops = Workshop::leftJoin("workshops_users", function($join){
                  $join->on("workshops.id", "=", "workshops_users.workshop_id")
                  ->where("workshops_users.application_status", "=", "pending");
              })
              ->leftJoin("countries", function($join){
                $join->on("workshops.country_id", "=", "countries.id");
               })
               ->leftJoin("cities", function($join){
                $join->on("workshops.city_id", "=", "cities.id");
               })
              ->select("workshops.id", "workshops.name","countries.name as countryName","cities.name as cityName","workshops.img_workshop", "workshops.limited_participants", "workshops.time")
              ->selectRaw('COUNT(workshops_users.application_status) as pendingParticipants')
              ->where("workshops.author", "=", $myID)
              ->orderBy('id', 'DESC')
              ->where('workshops.time','<=', $currentTime)
              ->whereNull("workshops.deleted_at")
              ->groupBy("workshops.id","workshops.name","workshops.time","workshops.limited_participants","workshops.img_workshop","countries.name","cities.name");
              
                
              if($this->search != null) 
               $pastsWorkshops = $pastsWorkshops->where('name','like','%'.$this->search.'%');

               $pastsWorkshops = $pastsWorkshops->paginate($page);
          }
  
         $workshops1 = Workshop::orderBy('deleted_at','asc')->onlyTrashed()->paginate(8,['*'], 'deletedWorkshopsPage');
              
          



        return view('livewire.show-pasts-workshops',['pastsWorkshops'=>$pastsWorkshops, 'workshops1'=>$workshops1]);
    }
    public function reloadPastsWorkshops($search,$perpage,$sortby){
        $this->search = $search;
        $this->perpage = $perpage;
        $this->sortby = $sortby;
    }
}
