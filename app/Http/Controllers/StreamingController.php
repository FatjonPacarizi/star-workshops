<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Streaming;
use App\Models\Workshop;
use App\Http\Requests\StoreStreamingRequest;
use App\Http\Requests\UpdateStreamingRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\workshops_users;

class StreamingController extends Controller
{

    public function index($workshopid,$id){

        $workshops = Workshop::find($workshopid);
        $workshop_users = workshops_users::where(['workshop_id'=>$workshopid,'user_id'=>Auth::id(),'application_status'=>'approved'])->get();
        $streaming1 = false;
        if(Auth::check())
        if(count($workshop_users) > 0 || Auth::user()->user_status == 'superadmin' || $workshops->author == Auth::user()->id)
            $streaming1 = true;
        $streaming = Streaming::find($id);
        if($streaming1 || $streaming->status == 'free'){
            Streaming::find($id)->increment('count');
        }        
        $streamings = Streaming::all()->where('workshop_id','=',$workshopid);
        $comments = Comment::latest('created_at')->where('streaming_id',$id)->simplepaginate(6);
        
        return view('streaming',['workshops'=>$workshops,'streaming'=>$streaming,'streamings'=>$streamings,'comments'=>$comments,'streaming1'=>$streaming1]);
    }

    public function show($id){

       $workshop = Workshop::find($id);
       if($workshop->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);

       return view('manageStreaming',['workshop'=>$workshop]);
    }

    public function insert($id){

        $workshops = Workshop::find($id);
        if($workshops->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);
        $streaming = Streaming::find($id);

        return view('insertStreaming',['workshops'=> $workshops,'streaming'=>$streaming]);
    }

    public function store(StoreStreamingRequest $request){

        $validated = $request->validated();
        Streaming::create($validated);

        return redirect()->back();
    }

    public function edit($id,$streaming){

        $streaming = Streaming::find($streaming);
        $workshops = Workshop::find($id);
        if($streaming->workshop_id != $workshops->id || $workshops->author != Auth::id() && request()->user()->user_status != 'superadmin') abort(403);

        return view('editStreaming',['streaming'=>$streaming,'workshops'=> $workshops]);
    }

    public function update(UpdateStreamingRequest $request, $id){

        $validated = $request->validated();
        $streamings = Streaming::find($id);
        $streamings->update($validated);

        return redirect()->back();
    }

    public function destroy($id){

        $streaming = Streaming::find($id);
        $streaming->delete();

        return redirect()->back();
    }

    public function changeStatus($id)
    {

        $getStatus = Streaming::select('status')->where('id', $id)->first();
        if ($getStatus->status == 'paid') {
            $status = 'free';
        } else {
            $status = 'paid';
        }
        Streaming::where('id', $id)->update(['status' => $status]);
        return redirect()->back();
    }

    public function streamingview(){

        return view('asideStreaming');
    }
}
