<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Streaming;
use App\Models\Workshop;
use App\Http\Requests\StoreStreamingRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class StreamingController extends Controller
{
    
    public function index($id){

        $streaming = Streaming::find($id);
        $comments = Comment::latest('created_at')->where('streaming_id',$id)->paginate(3);

        return view('streaming',['streaming'=>$streaming,'comments'=>$comments]);
    }

    public function show($id){

       $workshop = Workshop::find($id);
       $streaming = Streaming::all()->where('workshop_id',$id);

        return view('manageStreaming',['streaming'=>$streaming,'workshop'=>$workshop]);
    }

    public function insert($id){

        $workshops = Workshop::find($id);

        return view('insertStreaming',['workshops'=>$workshops]);
    }

    public function store(StoreStreamingRequest $request){

        $validated = $request->validated();
        Streaming::create($validated);

        return redirect()->back();
    }
    
    public function edit($id){

        $streaming = Streaming::find($id);

        return view('editStreaming',['streaming'=>$streaming]);
    }

    public function update(UpdateStreamingRequest $request, $id){

        $validated = $request->validated();
        Streaming::find($id)->update($validated);
        
        return back();
    }

    public function destroy($id){

        $streaming = Streaming::find($id);
        $streaming->delete();

        return redirect()->back();
    }


}