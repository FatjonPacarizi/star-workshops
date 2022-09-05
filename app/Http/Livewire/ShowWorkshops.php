<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Workshop;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ShowWorkshops extends Component
{
    use WithPagination;
    public function render()
    {
            //              ->where("workshops.name", 'LIKE', "%{$pastSearch}%")


          //dd($request->input('tab'));
          
          $currentTime = Carbon::now('Europe/Tirane');
  
          if(request()->user()->user_status == 'superadmin'){
              $upcomingWorkshops = Workshop::leftJoin("workshops_users", function($join){
                  $join->on("workshops.id", "=", "workshops_users.workshop_id")
                  ->where("workshops_users.application_status", "=", 'pending');
              })
              ->select("workshops.id", "workshops.name","workshops.img_workshop", "workshops.limited_participants", "workshops.time")
              ->selectRaw('COUNT(workshops_users.application_status) as pendingParticipants')
              ->whereNull("workshops.deleted_at")
              ->orderBy('id', 'DESC')
              ->where('workshops.time','>', $currentTime)
              ->groupBy("workshops.id","workshops.name","workshops.time","workshops.limited_participants","workshops.img_workshop")
              ->paginate(8,['*'], 'upcomingWorkshopsPage');
  
  
              $pastsWorkshops = Workshop::leftJoin("workshops_users", function($join){
                  $join->on("workshops.id", "=", "workshops_users.workshop_id")
                  ->where("workshops_users.application_status", "=", 'pending');
              })
              ->select("workshops.id", "workshops.name","workshops.img_workshop", "workshops.limited_participants", "workshops.time")
              ->selectRaw('COUNT(workshops_users.application_status) as pendingParticipants')
              ->whereNull("workshops.deleted_at")
              ->orderBy('id', 'DESC')
              ->where('workshops.time','<=', $currentTime)
              ->groupBy("workshops.id","workshops.name","workshops.time","workshops.limited_participants","workshops.img_workshop")
              ->paginate(8,['*'], 'pastsWorkshopsPage');
          }
          else{
             
              $myID = Auth::id();
  
              $upcomingWorkshops = Workshop::leftJoin("workshops_users", function($join){
  
                  $join->on("workshops.id", "=", "workshops_users.workshop_id")
                  ->where("workshops_users.application_status", "=", "pending");
              })
              ->select("workshops.id", "workshops.limited_participants","workshops.img_workshop", "workshops.name", "workshops.time")
              ->selectRaw('COUNT(workshops_users.application_status) as pendingParticipants')
              ->where("workshops.author", "=", $myID)
              ->where('workshops.time','>', $currentTime)
              ->orderBy('id', 'DESC')
              ->whereNull("workshops.deleted_at")
              ->groupBy("workshops.id","workshops.name","workshops.time","workshops.limited_participants","workshops.img_workshop")
              ->paginate(8,['*'], 'upcomingWorkshops');
  
  
              $pastsWorkshops = Workshop::leftJoin("workshops_users", function($join){
                  $join->on("workshops.id", "=", "workshops_users.workshop_id")
                  ->where("workshops_users.application_status", "=", "pending");
              })
              ->select("workshops.id", "workshops.limited_participants","workshops.img_workshop", "workshops.name", "workshops.time")
              ->selectRaw('COUNT(workshops_users.application_status) as pendingParticipants')
              ->where("workshops.author", "=", $myID)
              ->orderBy('id', 'DESC')
              ->where('workshops.time','<=', $currentTime)
              ->whereNull("workshops.deleted_at")
              ->groupBy("workshops.id","workshops.name","workshops.time","workshops.limited_participants","workshops.img_workshop")
              ->paginate(8,['*'], 'pastsWorkshopsPage');
          }
  
         $workshops1 = Workshop::orderBy('deleted_at','asc')->onlyTrashed()->paginate(8,['*'], 'deletedWorkshopsPage');
              
          



        return view('livewire.show-workshops',['upcomingWorkshops'=>$upcomingWorkshops,'pastsWorkshops'=>$pastsWorkshops, 'workshops1'=>$workshops1]);
    }
}
