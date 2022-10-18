<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Faq;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAboutRequest;

class aboutController extends Controller
{
    public function index()
    {
        return view('about', ['about' => About::all()->last(), 'faq' => Faq::all()->sortDesc()->take(10)->where('status', '==', 'Active')]);
    }

    public function abouts()
    {
        return view('about.edit', ['about' => About::all()->last()]);
    }

    public function update(UpdateAboutRequest $request, $id)
    {
        $validated = $request->validated();
        $about =  About::find($id);

        
        $about->update($validated);
        // delete old img only when db update is succesful
     

        return back();
    }
}
