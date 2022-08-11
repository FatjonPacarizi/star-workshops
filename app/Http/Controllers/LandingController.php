<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class LandingController extends Controller
{
    public function index(){
        $latest_workshops = Workshop::limit(5)->orderBy('id','desc')->get();

        return view('landing', ['latest_workshops' => $latest_workshops]);
    }
}
