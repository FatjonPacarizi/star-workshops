<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Streaming;
use App\Models\Workshop;

class StreamingController extends Controller
{
    public function view(){

        $streaming = Streaming::all();

        return view('listStreaming',['streaming'=>$streaming]);
    }

    public function index($id){

        $streaming = Streaming::find($id);

        return view('streaming',['streaming'=>$streaming]);
    }

    public function show($id){

       $streaming = Streaming::all()->where('workshop_id',$id);

        return view('manageStreamingAdd',['streaming'=>$streaming]);
    }
}
