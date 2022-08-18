<?php

namespace App\Http\Controllers;

use App\Models\NewsPage;
use App\Http\Requests\StoreNewsPageRequest;
use App\Http\Requests\UpdateNewsPageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsPageController extends Controller
{

    public function index()
    {
        $newspage = Newspage::all();
        return view('newspage', compact('newspage'));
    }

    public function newspage()
    {
        $newspage = Newspage::all();
        return view('newspages.index', compact('newspage'));
    }

    public function create()
    {
        return view('newspages.create');
    }

    public function store(StoreNewsPageRequest $request)
    {
        $newspage = new Newspage();
        $newspage->title = $request->input('title');
        $newspage->author = $request->input('author');
        $newspage->description = $request->input('description');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/newspages/', $filename);
            $newspage->image = $filename;
        }

        $newspage->save();
        return redirect('/newspages')->with('status', 'News Page image added successfully');
    }

    public function show(NewsPage $newsPage)
    {
        //
    }

    public function edit($id)
    {
        $newspage = Newspage::find($id);
        return view('newspages.edit', compact('newspage'));
    }

    public function update(UpdateNewsPageRequest $request, $id)
    {
        $newspage = Newspage::find($id);
        $newspage->title = $request->input('title');
        $newspage->author = $request->input('author');
        $newspage->description = $request->input('description');
        if ($request->hasFile('image')) {

            $destination = 'uploads/newspages/' . $newspage->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/newspages/', $filename);
            $newspage->image = $filename;
        }

        $newspage->update();
        return redirect()->back()->with('status', 'News image updated successfully');
    }

    public function destroy($id)
    {
        $newspage->delete();
        return redirect()->back()->with('status', 'News Page image deleted successfully');
    }
}
