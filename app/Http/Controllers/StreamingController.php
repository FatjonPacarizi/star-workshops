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
    
    public function index($id){

        $workshop_user = workshops_users::all();
        $streaming = Streaming::find($id);
        $streamings = Streaming::all()->where('workshop_id',$id);
        $comments = Comment::latest('created_at')->where('streaming_id',$id)->paginate(3);

        return view('streaming',['streaming'=>$streaming,'streamings'=>$streamings,'comments'=>$comments,'workshop_user'=>$workshop_user]);
    }

    public function show($id){

       $workshops = Workshop::find($id);

       return view('manageStreaming',['workshops'=>$workshops]);
    }

    public function insert($id){

        $workshops = Workshop::find($id);

        return view('insertStreaming',['workshops'=> $workshops]);
    }

    public function store(StoreStreamingRequest $request){

        $validated = $request->validated();
        Streaming::create($validated);

        return redirect()->back();
    }
    
    public function edit($id){

        $streaming = Streaming::find($id);
        $workshops = Workshop::find($id);

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