<?php

namespace App\Http\Controllers;

use PDF;
use Session;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\Workshop;
use App\Models\Streaming;
use App\Models\Workshop_Page;
use App\Models\workshops_users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateWorkshopRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\participantRequestNotification;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workshops',['workshopPageData'=>Workshop_Page::first()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showMembers(){
        
        return view('workshopMembers',['staffMembers' => User::has('members')->get()]);
    }
    public function singleMembers($id){
        $staffMembers = User::find($id);
        return view('single-member', ['staffMembers' => $staffMembers]);
   
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
    public function store()
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function show(Workshop $workshop)
    {   
            
            $streamings = Streaming::all()->where('workshop_id',$workshop->id);

            $workshop_user = workshops_users::all();

            $upcoming = false;
            if ($workshop->workshop_endTime == null) $upcoming = true;

            $application_status = workshops_users::select('application_status')->where(['workshop_id'=>$workshop->id,'user_id'=>Auth::id()])
            ->get();

            $already_applied = false;
            // if current user has alredy applied 
            if(count($application_status)>0)
                $already_applied = true;
            
            $workshop_participants = Workshop::Join("workshops_users", function($join){
                $join->on("workshops.id", "=", "workshops_users.workshop_id");
            })
            ->select("workshops.id as id","workshops.limited_participants as limited_participants")
            ->where("workshops_users.workshop_id",$workshop->id)
            ->get();

            $limitReached = false;
            $participants = 0;

            if(count($workshop_participants) > 0) {
                if($workshop_participants[0]->limited_participants != null && $workshop_participants[0]->limited_participants <= count($workshop_participants)) $limitReached = true;
                $participants =  $workshop_participants[0]->limited_participants;
            }
            
            

        return view('workshopPage',['workshop'=>$workshop,
                                    'limitReached' => $limitReached, 
                                    'participants' => $participants,
                                    'already_applied' => $already_applied,
                                    'application_status' => $application_status,
                                    'upcoming' => $upcoming,
                                    'streamings'=>$streamings,
                                     'workshop_user'=>$workshop_user]);
    }


    public function showWorkshopManage()
    {
        return view('manageWorkshops');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshop $workshop)
    {   
        //Secure
        if( $workshop->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);
           
        return view('editWorkshop', ['workshop'=>$workshop]);
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

        $admin_id = Workshop::find($id)->user->id;

         $admin_superadmins = User::where('user_status','superadmin')->orWhere(['id'=>$admin_id])->get();
         
        Notification::send($admin_superadmins,new participantRequestNotification(Auth()->user()));

        event(new \App\Events\NotificationEvent());

        return redirect()->back()->with('message','Congratulations you have successfuly applied');
    }

    public function showParticipants(Workshop $workshopid){
         //Secure
         if( $workshopid->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);
          

        $pendingParticipants = workshops_users::where(["workshop_id" => $workshopid->id,"application_status" => "pending"])
        ->paginate(8,['*'], 'pendingParticipantsPage');

        
        $approvedParticipants = workshops_users::where(["workshop_id" => $workshopid->id,"application_status" => "approved"])
        ->paginate(8,['*'], 'approvedParticipantsPage');


        $notapprovedParticipants = workshops_users::where(["workshop_id" => $workshopid->id,"application_status" => "notapproved"])
        ->paginate(8,['*'], 'notapprovedParticipantsPage');

        return view('manageParticipants',['workshopName'=>$workshopid->name,'pendingParticipants'=>$pendingParticipants,'approvedParticipants'=>$approvedParticipants,'notapprovedParticipants'=>$notapprovedParticipants]);
    }

    public function showPDF(Workshop $workshopid){
         //Secure
         if( $workshopid->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);


        $pendingParticipants = workshops_users::where(["workshop_id" => $workshopid->id,"application_status" => "pending"])
        ->paginate(8,['*'], 'pendingParticipantsPage');

        
        $approvedParticipants = workshops_users::where(["workshop_id" => $workshopid->id,"application_status" => "approved"])
        ->paginate(8,['*'], 'approvedParticipantsPage');


        $notapprovedParticipants = workshops_users::where(["workshop_id" => $workshopid->id,"application_status" => "notapproved"])
        ->paginate(8,['*'], 'notapprovedParticipantsPage');


        $pdf = PDF::loadView('managePDF', ['workshopName'=>$workshopid->name,'pendingParticipants'=>$pendingParticipants,'approvedParticipants'=>$approvedParticipants,'notapprovedParticipants'=>$notapprovedParticipants]);
        return $pdf->download('Workshop.pdf');
    }

    public function approveParticipant($workshopid,$participantantID){
         $workshop = Workshop::find($workshopid);
         //Secure
         if( $workshop->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);

         $applicant = User::find($participantantID); 
      
         DB::table('notifications')->where(['notifiable_id'=>Auth::id(),'data'=>'"'.$applicant->name.'"'])->update(['read_at'=>Carbon::now()]);  //clear notification


         workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>$participantantID])->update(['application_status' => 'approved']);

        
        return redirect()->back()->with("tab",request('tab'));
    }

    public function declineParticipant($workshopid,$participantantID){
         $workshop = Workshop::find($workshopid);
         //Secure
         if( $workshop->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);

         $applicant = User::find($participantantID); 
      
         DB::table('notifications')->where(['notifiable_id'=>Auth::id(),'data'=>'"'.$applicant->name.'"'])->update(['read_at'=>Carbon::now()]);  //clear notification

         workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>$participantantID])->update(['application_status' => 'notapproved']);

         return redirect()->back()->with("tab",request('tab'));
    }

    public function deleteParticipant($workshopid,$participantantID){
         $workshop = Workshop::find($workshopid);
         //Secure
         if( $workshop->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);

         workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>$participantantID])->delete();

         return redirect()->back()->with("tab",request('tab'));
    }

    public function calendar(){

        return view('calendar');
    }
    public function showWorkshopSettings(){
        return view('workshopSettings');
    }
}