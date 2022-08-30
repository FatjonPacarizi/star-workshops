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
        return view('AppInfos',['informations' => Informations::all()->last()]);
    }

   // Update informations
   public function update(UpdateInformationRequest $request, $id) {
    $validated = $request->validated();

    $appInfo =  Informations::find($id);

    if(request()->hasFile('logo_name')) {
        $validated['logo_name'] = request()->file('logo_name')->store('logos','public');
         //e ruajm old img para se me update
         $oldImg = $appInfo->logo_name;
    }

   //update appinfo
    Informations::find($id)->update($validated);

    
    // delete old img only when db update is succesful
    if(request()->hasFile('logo_name')) {
        //delete old img
        Storage::delete('/public/' .$oldImg);
    }
    
    return back();
}
}
