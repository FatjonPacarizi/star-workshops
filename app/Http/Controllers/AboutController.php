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

    public function store(Request $request)
    {
        $about = new about;
        
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'paragraph' => 'required',
            'button' => 'required',
            'image' => 'required',
        ]);
        
        $title = $request->input('title');
        $heading = $request->input('heading');
        $paragraph = $request->input('paragraph');
        $button = $request->input('button');
        if ($request->hasfile('image')) {

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filetitle = time() . '.' . $extention;
            $file->move('uploads/abouts/', $filetitle);
            $image = $filetitle;
        }
        $fields = [
            'title'=> $title,
            'heading'=> $heading,
            'paragraph'=> $paragraph,
            'button'=> $button,
            'image'=> $image,
            
        ];
        $about::create($fields);

        return redirect('/abouts')->with('status', 'about Created Successfully');
        
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