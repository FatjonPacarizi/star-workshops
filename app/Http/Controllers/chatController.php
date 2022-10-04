<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;

class chatController extends Controller
{
    //

    public function index(){
        //dd("here");
        return view('chat');
    }
    public function send(){
     
        broadcast(new MessageEvent("msg"));
      
    }

}
