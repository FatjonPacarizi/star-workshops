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

       // $user = User::where('user_status', '==', 'user')->get()->first();
        $user = positions_users::all()->where('position_id',2);

        return view('landing', ['upcomings' => $upcomings, 'newspage' => NewsPage::limit(3)->orderBy('id', 'DESC')->get(),'landing'=>Landing::all()->last(),'workshop'=>Workshop::all()->where('time','>=',$currentTime)->first(),'user'=>$user]);
    }

    public function landing()
    {
        return view('landings.edit', ['landing' => Landing::all()->last()]);
    }

    public function update(UpdateLandingRequest $request, $id)
    {
        $validated = $request->validated();

        landing::find($id)->update($validated);
        
        return redirect('/landings')->with('status', 'Landing Updated Successfully');
    }
}