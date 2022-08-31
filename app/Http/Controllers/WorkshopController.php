<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\Workshop;
use App\Models\Positions;
use Illuminate\Queue\Worker;
use App\Models\workshops_users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreWorkshopRequest;
use App\Http\Requests\UpdateWorkshopRequest;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentTime = Carbon::now('Europe/Tirane');

        $upcomings = Workshop::Join("users", function($join){
            $join->on("workshops.author", "=", "users.id");
        })
        ->where('workshops.time','>=',$currentTime)
        ->select("users.name as author",'workshops.id',"workshops.name as name", "workshops.img_workshop as img_workshop","workshops.time as time")
        ->orderBy('id', 'DESC')
        ->paginate(6,['*'], 'upcomingWorkshopsPage');

        
        $pasts = Workshop::Join("users", function($join){
            $join->on("workshops.author", "=", "users.id");
        })
        ->where('workshops.time','<',$currentTime)
        ->orderBy('id', 'DESC')
        ->select("users.name as author",'workshops.id',"workshops.name as name", "workshops.img_workshop as img_workshop","workshops.time as time")
        ->paginate(6,['*'], 'pastsWorkshopsPage');



       
        return view('workshops',['upcomings'=>$upcomings,'pasts'=>$pasts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showMembers(){


        $staffMembers = User::Join("positions_users", function($join){
            $join->on("users.id", "=", "positions_users.user_id");
        })
        ->Join("positions", function($join){
            $join->on("positions_users.position_id", "=", "positions.id");
        })
        ->where('positions.position','staff')
        ->select("users.name as name","users.description as description", "users.facebook as facebook","users.instagram as instagram","users.github as github","users.profile_photo_path as profile_photo_path")
        ->get();

        return view('workshopMembers',['staffMembers' => $staffMembers]);

    }
    public function create()
    {
        return view('insertWorkshop',[
        'countries'=>Country::all(),
        'cities'=>City::all(),
        'types'=>Type::all(),
        'categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkshopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkshopRequest $request)
    {
        $validated = $request->validated();
        $validated['author'] = Auth::id();

        if(request()->hasFile('img_workshop')) {
         
            $validated['img_workshop'] = request()->file('img_workshop')->store('workshopsImg','public');
        }
        
        Workshop::create($validated);
        
        return redirect()->route('adminsuperadmin.showManageWorkshops');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    

        $workshop = Workshop::Join("countries", function($join){
                $join->on("workshops.country_id", "=", "countries.id");
            })
            ->Join("users", function($join){
                $join->on("workshops.author", "=", "users.id");
            })
            ->select("workshops.id as id","workshops.name as name","workshops.description as description","users.name as author","workshops.time as time","workshops.img_workshop as img_workshop","countries.name AS country")
            ->where('workshops.id',$id)
            ->get();     

            //  dd($workshop);

            
            $application_status = workshops_users::select('application_status')->where(['workshop_id'=>$id,'user_id'=>Auth::id()])
            ->get();
            

            $already_applied = false;
            // if current user has alredy applied 
            if(count($application_status)>0)
                $already_applied = true;
            

            $workshop_participants = Workshop::Join("workshops_users", function($join){
                $join->on("workshops.id", "=", "workshops_users.workshop_id");
            })
            ->select("workshops.id as id","workshops.limited_participants as limited_participants")
            ->get();

          //  dd(count($workshop_participants));
          //  dd($workshop_participants[0]->limited_participants);
            $limitReached = false;
            if($workshop_participants[0]->limited_participants <= count($workshop_participants)) $limitReached = true; 
            
           
        return view('workshopPage',['workshop'=>$workshop[0],
                                    'limitReached' => $limitReached, 
                                    'participants' => $workshop_participants[0]->limited_participants,
                                    'already_applied' => $already_applied,
                                    'application_status' => $application_status]);
    }


    public function showWorkshopManage()
    {
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
            
        return view('manageWorkshops',['upcomingWorkshops'=>$upcomingWorkshops,'pastsWorkshops'=>$pastsWorkshops, 'workshops1'=>$workshops1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$participants)
    {
        $workshop = Workshop::find($id);
       
        //Secure
        if( $workshop->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);
           
        return view('editWorkshop', ['workshop'=>$workshop,
                                    'participants'=>$participants,
                                    'countries'=>Country::all(),
                                    'cities'=>City::all(),
                                    'types'=>Type::all(),
                                    'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkshopRequest  $request
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkshopRequest $request,$id)
    {   
        $validated = $request->validated();

        $currentWorkshop = Workshop::find($id);

        //Secure
        if( $currentWorkshop->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);

        if(request()->hasFile('img_workshop')) {
         
            $validated['img_workshop'] = request()->file('img_workshop')->store('workshopsImg','public');

            //e ruajm old workshopimg para se me update
             $oldWorkshopImg = $currentWorkshop->img_workshop;
        }
        
        
        //update workshop
        $currentWorkshop->update($validated);
        
        // delete old img only when db update is succesful
        if(request()->hasFile('img_workshop')) {
        //delete old img
        Storage::delete('/public/' .$oldWorkshopImg);
        }
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        
        return back()->with("tab",request('tab'));
    }


    public function join($id){

        if(!Auth::check())
          return redirect()->route('login');

          $application_status = workshops_users::select('application_status')->where(['workshop_id'=>$id,'user_id'=>Auth::id()])
          ->get();
          
        if(count($application_status) == 0)
        {
                workshops_users::create(
                    [
                        'workshop_id' => $id,
                        'user_id' => Auth::id()
                    ]
                );
        }

        return redirect('/workshop/'.$id)->with('message','Congratulations you have successfuly applied');
    }

    public function showParticipants($workshopid){

        $pendingParticipants = Workshop::Join("workshops_users", function($join){
            $join->on("workshops.id", "=", "workshops_users.workshop_id");
        })
        ->Join("users", function($join){
            $join->on("workshops_users.user_id", "=", "users.id");
        })
        ->select("workshops.id as workshopID","users.name as name","users.email as email","workshops.time as time","workshops_users.user_id as user_id")
        ->where(["workshops.id" => $workshopid, "workshops_users.application_status" => "pending"])
        ->paginate(8,['*'], 'pendingParticipantsPage');

        $approvedParticipants = Workshop::Join("workshops_users", function($join){
            $join->on("workshops.id", "=", "workshops_users.workshop_id");
        })
        ->Join("users", function($join){
            $join->on("workshops_users.user_id", "=", "users.id");
        })
        ->select("workshops.id as workshopID","users.name as name","users.email as email","workshops.time as time","workshops_users.user_id as user_id")
        ->where(["workshops.id" => $workshopid, "workshops_users.application_status" => "approved"])
        ->paginate(8,['*'], 'approvedParticipantsPage');

        $notapprovedParticipants = Workshop::Join("workshops_users", function($join){
            $join->on("workshops.id", "=", "workshops_users.workshop_id");
        })
        ->Join("users", function($join){
            $join->on("workshops_users.user_id", "=", "users.id");
        })
        ->select("workshops.id as workshopID","users.name as name","users.email as email","workshops.time as time","workshops_users.user_id as user_id")
        ->where(["workshops.id" => $workshopid, "workshops_users.application_status" => "notapproved"])
        ->paginate(8,['*'], 'notapprovedParticipantsPage');


        return view('manageParticipants',['pendingParticipants'=>$pendingParticipants,'approvedParticipants'=>$approvedParticipants,'notapprovedParticipants'=>$notapprovedParticipants]);
    }
    public function approveParticipant($workshopid,$participantantID){
        $formFields = [
            'application_status' => 'approved'
         ];

         $partiant = workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>$participantantID]);
         $partiant->update($formFields);

        return redirect()->back()->with("tab",request('tab'));

    }

    public function declineParticipant($workshopid,$participantantID){
        $formFields = [
            'application_status' => 'notapproved'
         ];

         $partiant = workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>$participantantID]);
         $partiant->update($formFields);

         return redirect()->back()->with("tab",request('tab'));

    }
    public function deleteParticipant($workshopid,$participantantID){
       
         $partiant = workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>$participantantID]);
         $partiant->delete();

         return redirect()->back()->with("tab",request('tab'));

    }

    public function restore($id){

        $workshop = Workshop::onlyTrashed()->findOrFail($id);
        $workshop->restore();

        return redirect()->back();

    }

    public function forceDelete($id)
{
   
        $workshop = Workshop::onlyTrashed()->findOrFail($id);
        $workshop->forceDelete();

        return redirect()->back();
      
    }
}