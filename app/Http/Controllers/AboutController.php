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
        $about->title = $request->input('title');
        $about->heading = $request->input('heading');
        $about->paragraf = $request->input('paragraf');
        $about->button = $request->input('button');
      
    if(request()->hasFile('image')) {
        $formFields['image'] = request()->file('image')->store('image','public');

         //e ruajm old img para se me update
         $oldImg = $about->image;
    }


   //update appinfo
    Abouts::find($id)->update($formFields);

    
    // delete old img only when db update is succesful
    if(request()->hasFile('image')) {
        //delete old img
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
        $about->paragraf = $request->input('paragraf');
        $about->button = $request->input('button');
        if($request->hasfile('image'))
        {
            $destination = 'uploads/abouts/'.$about->image;
           
            if (File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filetitle = time().'.'.$extention;
            $file->move('uploads/abouts/', $filetitle);
            $about->image = $filetitle;
        }
      
        $about->update();
        return redirect()->back()->with('status','about Image Updated Successfully');
    }

   
}