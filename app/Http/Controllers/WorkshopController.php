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
        return view('workshops',['upcomings'=>Workshop::whereDate('time', '>=', $currentTime->toDateTimeString())->get(),'pasts'=>Workshop::whereDate('time', '<', $currentTime->toDateTimeString())->get()]);
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
        ->select("users.name as name","users.description as description")
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

        $formFields = $request->validate([
            'name' => 'required',
            'country_id' => 'required',
            'type_id' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',
            'time' => 'required',
        ]);
        $formFields['author'] = Auth::id();

        if(request()->hasFile('img_workshop')) {
         
            $formFields['img_workshop'] = request()->file('img_workshop')->store('workshopsImg','public');
        }
        
        Workshop::create($formFields);
        
        return view('manageWorkshops',['workshops'=>Workshop::all()]);
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
            ->select("workshops.name as name","workshops.time as time","workshops.img_workshop as img_workshop","countries.name AS country")
            ->where('workshops.id',$id)
            ->get();     
            
          
        return view('workshopPage',['workshop'=>$workshop[0]]);
    }


    public function showWorkshopManage()
    {
        if(request()->user()->user_status == 'superadmin')
            $workshops = Workshop::all();
        else
            $workshops = Workshop::where('author', Auth::id())->get();

        return view('manageWorkshops',['workshops'=>$workshops]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->user()->user_status == 'superadmin')
            $workshop = Workshop::find($id);
        else{
            $workshop = Workshop::find($id);
            if( $workshop->author != Auth::id()) abort(403);
        }
           
        return view('editWorkshop', ['workshop'=>$workshop,
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
    public function update($id)
    {   
        $formFields = request()->validate([
            'name' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'time' => 'required',
        ]);


        $currentWorkshop = Workshop::find($id);

        if( $currentWorkshop->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);

        if(request()->hasFile('img_workshop')) {
         
            $formFields['img_workshop'] = request()->file('img_workshop')->store('workshopsImg','public');

            //e ruajm old workshopimg para se me update
             $oldWorkshopImg = $currentWorkshop->img_workshop;
        }
        
        
        //update workshop
        $currentWorkshop->update($formFields);
        
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

        return back();
    }
}
