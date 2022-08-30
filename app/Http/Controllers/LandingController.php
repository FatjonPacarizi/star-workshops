<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Landing;
use App\Models\Workshop;
use App\Models\NewsPage;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateLandingRequest;

class LandingController extends Controller
{
    public function index(){
        
        $currentTime = Carbon::now('Europe/Tirane');

        $newspage = NewsPage::limit(3)->orderBy('id', 'DESC')->get();

        $upcomings = Workshop::limit(6)->Join("users", function($join){
            $join->on("workshops.author", "=", "users.id");
        })
        ->where('workshops.time','>=',$currentTime)
        ->select("users.name as author",'workshops.id',"workshops.name as name", "workshops.img_workshop as img_workshop","workshops.time as time")   
        ->orderBy('workshops.id','desc')->get();

        return view('landing', ['upcomings' => $upcomings, 'newspage' => $newspage]);

    }

    public function landing()
    {
        return view('landings.edit', ['landing' => Landing::all()->last()]);
    }

    public function update(UpdateLandingRequest $request, $id)
    {
        $landing = landing::find($id);

        $validated = $request->validated();

        if(request()->hasFile('image')) {
         
            $validated['image'] = request()->file('image')->store('landingImgs','public');

            //e ruajm old workshopimg para se me update
             $oldLandingImg = $landing->image;
        }
        //update workshop
        $landing->update($validated);
        
        // delete old img only when db update is succesful
        if(request()->hasFile('image')) {
        //delete old img
        Storage::delete('/public/' .$oldLandingImg);
        }

        return redirect('/landings')->with('status', 'Landing Updated Successfully');
    }
}