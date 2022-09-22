<?php

namespace App\Http\Controllers;

use PDF;
use DateTime;
use DateTimeZone;
use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\Workshop;
use App\Models\Streaming;
use App\Models\streamings_workshops;
use App\Models\workshops_users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreWorkshopRequest;
use App\Http\Requests\UpdateWorkshopRequest;
use App\Mail\newWorkshopEmailSender;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workshops');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showMembers(){
        return view('workshopMembers',['staffMembers' => User::has('members')->get()]);
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

        $workshop_ids =  Workshop::where('category_id',$request->input('category_id'))->get() ->map(function ($item) {
            return $item->id;
        });

        $users = workshops_users::whereIn('workshop_id',$workshop_ids)->get();

        $emails = array();
        for($i=0;$i<count($users);$i++){
            if (!in_array($users[$i]->user->email, $emails)){
                $emails[$i] = $users[$i]->user->email;
            }
        }

        $workshop =  Workshop::create($validated);

        if(count($users)>0)  Mail::to($emails)->send(new newWorkshopEmailSender($workshop->id,$workshop->name));
        
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
            $workshop = Workshop::where('workshops.id',$id)->get();     

            $streamings = Streaming::all()->where('workshop_id',$id);

            $upcoming = false;
            if ($workshop[0]->workshop_endTime == null) $upcoming = true;

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
            ->where("workshops_users.workshop_id",$id)
            ->get();

            $limitReached = false;
            $participants = 0;

            if(count($workshop_participants) > 0) {
                if($workshop_participants[0]->limited_participants != null && $workshop_participants[0]->limited_participants <= count($workshop_participants)) $limitReached = true;
                $participants =  $workshop_participants[0]->limited_participants;
            }
            
            

        return view('workshopPage',['workshop'=>$workshop[0],
                                    'limitReached' => $limitReached, 
                                    'participants' => $participants,
                                    'already_applied' => $already_applied,
                                    'application_status' => $application_status,
                                    'upcoming' => $upcoming,
                                    'streamings'=>$streamings]);
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

    public function startWorkshop($id){

        $workshop_startTime = null;
        
        if(request()->input('started') != null) $workshop_startTime = Carbon::now()->timezone('Europe/Tirane')->toDateTimeString();

        Workshop::where('id',$id)->update(['workshop_startTime' => $workshop_startTime]);
        return back();
    }

    public function endWorkshop($id){

        $workshop_endTime = null;
        
        if(request()->input('ended') != null) $workshop_endTime = Carbon::now()->timezone('Europe/Tirane')->toDateTimeString();
      

        Workshop::where('id',$id)->update(['workshop_endTime' => $workshop_endTime]);
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
        Workshop::where('id',$workshop->id)->update(['deleted_from_id' => Auth::id()]);
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

        return redirect()->back()->with('message','Congratulations you have successfuly applied');
    }

    public function showParticipants($workshopid){


        $pendingParticipants = workshops_users::where(["workshop_id" => $workshopid,"application_status" => "pending"])
        ->paginate(8,['*'], 'pendingParticipantsPage');

        
        $approvedParticipants = workshops_users::where(["workshop_id" => $workshopid,"application_status" => "approved"])
        ->paginate(8,['*'], 'approvedParticipantsPage');


        $notapprovedParticipants = workshops_users::where(["workshop_id" => $workshopid,"application_status" => "notapproved"])
        ->paginate(8,['*'], 'notapprovedParticipantsPage');

        return view('manageParticipants',['workshopName'=>Workshop::select('name')->where('id',$workshopid)->get(),'pendingParticipants'=>$pendingParticipants,'approvedParticipants'=>$approvedParticipants,'notapprovedParticipants'=>$notapprovedParticipants]);
    }

    public function showPDF($workshopid){

        $pendingParticipants = workshops_users::where(["workshop_id" => $workshopid,"application_status" => "pending"])
        ->paginate(8,['*'], 'pendingParticipantsPage');

        
        $approvedParticipants = workshops_users::where(["workshop_id" => $workshopid,"application_status" => "approved"])
        ->paginate(8,['*'], 'approvedParticipantsPage');


        $notapprovedParticipants = workshops_users::where(["workshop_id" => $workshopid,"application_status" => "notapproved"])
        ->paginate(8,['*'], 'notapprovedParticipantsPage');


        $pdf = PDF::loadView('managePDF', ['workshopName'=>Workshop::select('name')->where('id',$workshopid)->get(),'pendingParticipants'=>$pendingParticipants,'approvedParticipants'=>$approvedParticipants,'notapprovedParticipants'=>$notapprovedParticipants]);
        return $pdf->stream('managePDF.pdf');
    }

    public function approveParticipant($workshopid,$participantantID){
        
        workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>$participantantID])->update(['application_status' => 'approved']);

        return redirect()->back()->with("tab",request('tab'));
    }

    public function declineParticipant($workshopid,$participantantID){
         
         workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>$participantantID])->update(['application_status' => 'notapproved']);

         return redirect()->back()->with("tab",request('tab'));
    }

    public function deleteParticipant($workshopid,$participantantID){
       
         workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>$participantantID])->delete();

         return redirect()->back()->with("tab",request('tab'));
    }

    public function restore($id){
       
        Workshop::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }

    public function forceDelete($id){
        $workshop = Workshop::onlyTrashed()->findOrFail($id);
        Storage::delete('/public/' .$workshop->img_workshop);
        $workshop->forceDelete();

        return redirect()->back();
    }
}