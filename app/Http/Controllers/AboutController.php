<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class aboutController extends Controller
{
    public function index () {
        return view('about', ['about' =>About::all()->last()]);
    }

    public function abouts()
    {
        return view('about.edit', ['about' => About::all()->last()]);
    }

    public function create()
    {
        return view('about.create');
    }
    public function store(StoreAboutRequest $request)
    {
        $validated = $request->validated();
    
        if ($request->hasfile('image')) {
            $validated['image'] = request()->file('image')->store('AboutsImg','public');
        }
        
        About::create($validated);
        return redirect('/abouts')->with('status', 'about Created Successfully');   
     }

    public function edit($id)
    {
        $about = about::find($id);
        return view('about.edit', compact('about'));
    }

    public function update(UpdateAboutRequest $request, $id)
    {
        dd("qekjo");
        $validated = $request->validated();
        $about =  About::find($id);

        if(request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('AboutsImg','public');
             // Save old Image 
             $oldImg = $about->image;
        }
       //update appinfo
         $about->update($validated);
        // delete old img only when db update is succesful
        if(request()->hasFile('image')) {
            //delete old img
            Storage::delete('/public/' .$oldImg);
        } 
        
        return back();
    }
}
