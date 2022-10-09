<?php

namespace App\Http\Controllers;

use App\Models\NewsPage;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreNewsPageRequest;
use App\Http\Requests\UpdateNewsPageRequest;
use Illuminate\Support\Facades\Auth;

class NewsPageController extends Controller
{

    public function index()
    {
        return view('newspage');
    }

    public function  newspage()
    {
        return view('newspages.index');

    }

    public function create()
    {
        return view('newspages.create');
    }

    public function store(StoreNewsPageRequest $request)
    {
        $validated = $request->validated();
        $validated['author'] = Auth::id();

        if (request()->hasFile('image')) {
            $validated['image'] = request()->file('image')->store('newsImgs', 'public');
        }

        newspage::create($validated);

        return redirect('/news');
    }

    public function show($id)
    {
        $newspage = Newspage::find($id);
        return view('newsp', ['newspage' => $newspage, 'threenews' => Newspage::where('id', '!=', $id)->orderBy('id', 'DESC')->paginate(3)]);
    }

    public function edit($id)
    {
        $newspage = Newspage::find($id);
        return view('newspages.edit', compact('newspage'));
    }

    public function update(UpdateNewsPageRequest $request, $id)
    {
        $request->author = Auth::id();

        $validated = $request->validated();

        $newspage = Newspage::find($id);
        if (request()->hasFile('image')) {

            $validated['image'] = request()->file('image')->store('newsImgs', 'public');
            $oldNewsImg = $newspage->image;
        }

        $newspage->update($validated);

        // delete old img only when db update is succesful
        if (request()->hasFile('image')) {
            Storage::delete('/public/' . $oldNewsImg);
        }
        return redirect('/news');
    }

    public function destroy($id)
    {
        $newspage = Newspage::find($id);
        Storage::delete('/public/' . $newspage->image);
        $newspage->delete();
        return redirect('/news');
    }
}
