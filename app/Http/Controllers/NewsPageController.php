<?php

namespace App\Http\Controllers;

use App\Models\NewsPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreNewsPageRequest;
use App\Http\Requests\UpdateNewsPageRequest;
=======
use Illuminate\Support\Str;
use Carbon\Carbon;
>>>>>>> 54eb3f6626ba716c5bfce27195dbaaab6bf6ef60

class NewsPageController extends Controller
{

    public function index()
    {
        $date = Carbon::now();
        $newspage = Newspage::orderBy('id', 'DESC')->get();
        return view('newspage', compact('newspage'));
    }

    public function newspage()
    {
        $date = Carbon::now();
        $newspage = Newspage::paginate(8);
        return view('newspages.index', compact('newspage'));
    }

    public function create()
    {
        return view('newspages.create');
    }

    public function store(StoreNewsPageRequest $request)
    {
<<<<<<< HEAD
        $validated = $request->validated();
      
        if(request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('newsImgs','public');
=======
        $newspage = new Newspage();
        $newspage->title = $request->input('title');
        $newspage->author = $request->input('author');
        $newspage->description = $request->input('description');
        $newspage->time = $request->input('time');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/newspages/', $filename);
            $newspage->image = $filename;
>>>>>>> 54eb3f6626ba716c5bfce27195dbaaab6bf6ef60
        }
        
        newspage::create($validated);

        return redirect('/newspages')->with('status', 'News added successfully');
    }

    public function show($id)
    {
        $newspage = Newspage::find($id);
        return view('newsp',['newspage'=>$newspage]);
    }

    public function edit($id)
    {
        $newspage = Newspage::find($id);
        return view('newspages.edit', compact('newspage'));
    }

    public function update(UpdateNewsPageRequest $request, $id)
    {
        $validated = $request->validated();
      
        $newspage = Newspage::find($id);
<<<<<<< HEAD
        if(request()->hasFile('image')) {
         
            $validated['image'] = request()->file('image')->store('newsImgs','public');
=======
        $newspage->title = $request->input('title');
        $newspage->author = $request->input('author');
        $newspage->description = $request->input('description');
        $newspage->time = $request->input('time');
        if ($request->hasFile('image')) {
>>>>>>> 54eb3f6626ba716c5bfce27195dbaaab6bf6ef60

            //e ruajm old workshopimg para se me update
             $oldNewsImg = $newspage->image;
        }
        
        //update workshop
        $newspage->update($validated);
        
        // delete old img only when db update is succesful
        if(request()->hasFile('image')) {
        //delete old img
        Storage::delete('/public/' .$oldNewsImg);
        }
        return redirect('/newspages')->with('status', 'News updated successfully');
    }

    public function destroy($id)
    {
        $newspage = Newspage::find($id);
        $destination = 'uploads/newspage/'.$newspage->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        $newspage->delete();
        return redirect('/newspages')->with('status', 'News deleted successfully');
    }
}
