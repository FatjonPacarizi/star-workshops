<?php

namespace App\Http\Controllers;

use App\Models\Informations;
use Illuminate\Support\Facades\Storage;
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
        return view('AppInfos', ['informations' => Informations::all()->last()]);
    }

    public function update(UpdateInformationRequest $request, $id)
    {
        $validated = $request->validated();

        $appInfo =  Informations::find($id);

        if (request()->hasFile('logo_name')) {
            $validated['logo_name'] = request()->file('logo_name')->store('logos', 'public');
            $oldImg = $appInfo->logo_name;
        }

        Informations::find($id)->update($validated);

        // delete old img only when db update is succesful
        if (request()->hasFile('logo_name')) {
            Storage::delete('/public/' . $oldImg);
        }

        return back();
    }
}
