<?php

namespace App\Http\Controllers;

use App\Models\Informations;
use Illuminate\Http\Request;
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


   // Update informations
   public function update($id) {
    $formFields = request()->validate([
        'app_name' => 'required',
    ]);

    if(request()->hasFile('logo_name')) {
        $formFields['logo_name'] = request()->file('logo_name')->store('logos','public');
    }

    Informations::find($id)->update($formFields);

    return back();
}
}
