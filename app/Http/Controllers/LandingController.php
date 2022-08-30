<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use App\Models\Workshop;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateLandingRequest;

class LandingController extends Controller
{
    public function index(){
        $latest_workshops = Workshop::limit(5)
        ->Join("users", function($join){
            $join->on("workshops.author", "=", "users.id");
        })
        ->select("users.name as author","workshops.name as name","workshops.id as id", "workshops.time as time")        
        ->orderBy('workshops.id','desc')->get();

        return view('landing', ['latest_workshops' => $latest_workshops]);
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