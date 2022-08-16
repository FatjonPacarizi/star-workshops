<?php

namespace App\Http\Controllers;

use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreInformationRequest;
use App\Http\Requests\UpdateInformationRequest;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AppInfos',['informations' => Informations::latest()->take(1)->get()]);
    }

    public function showicons(){

        $informaitons = Informations::latest()->take(1)->get();
        
        return view('layouts.partials.footer',['informaitons'=> $informaitons]);
    }


   // Update informations
   public function update($id) {
    $formFields = request()->validate([
        'app_name' => 'required',
        'facebook' => 'required',
        'instagram' => 'required',
        'twitter' => 'required',
        'linkedin' => 'required',
    ]);


    $appInfo =  Informations::find($id);


    if(request()->hasFile('logo_name')) {
        $formFields['logo_name'] = request()->file('logo_name')->store('logos','public');

         //e ruajm old img para se me update
         $oldImg = $appInfo->logo_name;
    }


   //update appinfo
    Informations::find($id)->update($formFields);

    
    // delete old img only when db update is succesful
    if(request()->hasFile('logo_name')) {
        //delete old img
        Storage::delete('/public/' .$oldImg);
    }
    
    return back();
}
}
