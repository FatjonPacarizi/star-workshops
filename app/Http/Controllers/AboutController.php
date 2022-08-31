<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class aboutController extends Controller
{
    public function index () {
        return view('about', ['about' =>About::all()->last(), 'faq' => Faq::all()->sortDesc()->take(10)->where('status', '==', 'Active')]);
    }

    public function abouts()
    {
        return view('about.edit', ['about' => About::all()->last()]);
    }

    public function update(UpdateAboutRequest $request, $id)
    {
        $validated = $request->validated();
        $about =  About::find($id);

        if(request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('AboutsImg','public');
             // Save old Image 
             $oldImg = $about->image;
        }
       //update about
         $about->update($validated);
        // delete old img only when db update is succesful
        if(request()->hasFile('image')) {
            //delete old img
            Storage::delete('/public/' .$oldImg);
        } 
        
        return back();
    }
}
