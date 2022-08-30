<?php

namespace App\Http\Controllers;

use App\Models\NewsPage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreNewsPageRequest;
use App\Http\Requests\UpdateNewsPageRequest;
use Carbon\Carbon;

class NewsPageController extends Controller
{

    public function index()
    {
        $date = Carbon::now();
    
        $newspages= Newspage::paginate(5);
        return view('newspage',['newspages' =>$newspages]);
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
        $validated = $request->validated();
      
        if(request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('newsImgs','public');
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
        if(request()->hasFile('image')) {
         
            $validated['image'] = request()->file('image')->store('newsImgs','public');
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
