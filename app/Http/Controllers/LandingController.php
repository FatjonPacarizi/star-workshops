<?php

namespace App\Http\Controllers;
use App\Models\Landing;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index(){
        $latest_workshops = Workshop::limit(5)
        ->Join("users", function($join){
            $join->on("workshops.author", "=", "users.id");
        })
        ->select("users.name as author","workshops.name as name","workshops.id as id", "workshops.time as time")        
        ->orderBy('workshops.id','desc')->get();

        return view('landing', ['latest_workshops' => $latest_workshops]);
    }

    
    public function landing()
    {
        $landing = Landing::all();
        return view('landings.index', compact('landing'));
    }

    public function create()
    {
        return view('landings.create');
    }

    public function store(Request $request)
    {
        $landing = new Landing;
        
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'paragraf' => 'required',
            'button' => 'required',
            'image' => 'required',
        ]);
        
        $title = $request->input('title');
        $heading = $request->input('heading');
        $paragraf = $request->input('paragraf');
        $button = $request->input('button');
        if ($request->hasfile('image')) {

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filetitle = time() . '.' . $extention;
            $file->move('uploads/landings/', $filetitle);
            $image = $filetitle;
        }
        $fields = [
            'title'=> $title,
            'heading'=> $heading,
            'paragraf'=> $paragraf,
            'button'=> $button,
            'image'=> $image,
            
        ];
        $landing::create($fields);

        return redirect('/landings')->with('status', 'Landing Created Successfully');
        
        }

    public function edit($id)
    {
        $landing = landing::find($id);
        return view('landings.edit', compact('landing'));
    }

    public function update(Request $request, $id)
    {
        $landing = landing::find($id);

        $landing->title = $request->input('title');
        $landing->heading = $request->input('heading');
        $landing->paragraf = $request->input('paragraf');
        $landing->button = $request->input('button');
        if ($request->hasfile('image')) {
            $destination = 'uploads/landings/' . $landing->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filetitle = time() . '.' . $extention;
            $file->move('uploads/landings/', $filetitle);
            $landing->image = $filetitle;
        }

        $landing->update();
        return redirect()->back()->with('status', 'Landing Updated Successfully');
    }
}