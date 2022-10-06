<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\positions_users;
use Illuminate\Support\Facades\Auth;
use App\Models\Landing;
use App\Models\Workshop;
use App\Models\NewsPage;
use App\Http\Requests\UpdateLandingRequest;

class LandingController extends Controller
{
    public function index(){
        
        $currentTime = Carbon::now('Europe/Tirane');

        $upcomings = Workshop::limit(6)
        ->where('workshops.time','>=',$currentTime)
        ->orderBy('id','desc')->get();
        
        return view('landing', ['upcomings' => $upcomings, 'newspage' => NewsPage::limit(3)->orderBy('id', 'DESC')->get(),
        'section1'=>Landing::where('section_id','section1')->first(),
        'section2'=>Landing::where('section_id','section2')->first(),
        'section3'=>Landing::where('section_id','section3')->first(),
        'section4'=>Landing::where('section_id','section4')->first(),
        'section5'=>Landing::where('section_id','section5')->first(),
        'section6'=>Landing::where('section_id','section6')->first(),
        'section7'=>Landing::where('section_id','section7')->first(),
        'section8'=>Landing::where('section_id','section8')->first(),]);
    }

    public function landing()
    {
        return view('landings.edit', ['landing' => Landing::all()]);
    }

    public function update(UpdateLandingRequest $request, $id)
    {
        $validated = $request->validated();

        landing::find($id)->update($validated);
        
        return redirect('/landings')->with('status', 'Landing Updated Successfully');
    }
    public function edit($id){
            $landing = Landing::find($id);

            return view('landings.editlandings',['landing' => $landing]);

    }
}