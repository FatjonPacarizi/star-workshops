<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::all()->sortDesc();
        return view('faq',['faq'=>$faq]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insertfaq');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        $formFields = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);  
        Faq::create($formFields);
        
        return redirect()->route('superadmin.faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);

        return view('editfaq',['faq' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqRequest  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqRequest $request, $id)
    {
        $formFields = request()->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);
    
       //update appinfo
        Faq::find($id)->update($formFields);
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back();
    }

    public function changeStatus($id){

       $getStatus = Faq::select('status')->where('id',$id)->first();
       if($getStatus->status == 'active' ){
        $status = 'deactive';
       }else{
        $status = 'active';
       }
       Faq::where('id',$id)->update(['status'=>$status]);
       return redirect()->back();
    }
}
