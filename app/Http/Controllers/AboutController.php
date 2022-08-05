<?php

namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{   
    function about () {
        $data = About::all();
        return view('aboutview', ['data'=>$data]);
    }
    public function index()
    {
        $about = about::all();
        return view('about.index', compact('about'));
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
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filetitle = time().'.'.$extention;
            $file->move('uploads/abouts/', $filetitle);
            $about->image = $filetitle;
        }
     
        $about->save();
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
            
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filetitle = time().'.'.$extention;
            $file->move('uploads/abouts/', $filetitle);
            $about->image = $filetitle;
        }
      
        $about->update();
        return redirect()->back()->with('status','about Image Updated Successfully');
    }

    public function destroy($id)
    {
        $about = about::find($id);
        $destination = 'uploads/abouts/'.$about->image;
        
        $about->delete();
        return redirect()->back()->with('status','about Image Deleted Successfully');
    }
}