<?php

namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class AboutController extends Controller
{   
    public function index () {
        
        $about = About::all();
        return view('about', ['about' => $about]);
    }
    
    public function abouts()
    {
        $about = About::all();
        return view('about.index', ['about' => $about]);
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(StoreAboutRequest $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'paragraph' => 'required',
            'image' => 'required',
            'button' => 'required',
            
        ]);
        $about = new about;
        $about->title = $request->input('title');
        $about->heading = $request->input('heading');
        $about->paragraph = $request->input('paragraph');
        $about->button = $request->input('button');
      
    if(request()->hasFile('image')) {
        $formFields['image'] = request()->file('image')->store('image','public');
         $oldImg = $about->image;
    }
    Abouts::find($id)->update($formFields);
    if(request()->hasFile('image')) {
        Storage::delete('/public/' .$oldImg);
    }
     
        $about->update();
        return redirect()->back()->with('status','about Image Added Successfully');
    }

    public function edit($id)
    {
        $about = about::find($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {


        $about = about::find($id);
       
        $about->title = $request->input('title');
        $about->heading = $request->input('heading');
        $about->paragraph = $request->input('paragraph');
        $about->button = $request->input('button');
        $currentAbout = About::find($id);
        if(request()->hasFile('image')) {
         
            $formFields['image'] = request()->file('image')->store('AboutsImg','public');

            //e ruajm old Aboutimg para se me update
             $oldAboutImg = $currentAbout->image;
        }
        
        
        //update About
 
        
        // delete old img only when db update is succesful
        if(request()->hasFile('image')) {
        //delete old img
        Storage::delete('/public/' .$oldAboutImg);
        }
      
        $about->update();
        return redirect()->back()->with('status','About Image Updated Successfully');
    }

   
}