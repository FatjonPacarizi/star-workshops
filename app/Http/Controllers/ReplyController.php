<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reply;
use App\Http\Requests\StoreReplyRequest;

class ReplyController extends Controller
{
    public function store(StoreReplyRequest $request){
        
        if(Auth::check()) {
            Reply::create([
                'comment_id' => $request->input('comment_id'),
                'name' => Auth::user()->name,
                'reply' => $request->input('reply'),
                'user_id' => Auth::user()->id
            ]);

            return redirect()->back()->with('success','Reply added');
        }

        return back()->withInput()->with('error','Somthing wrong');
    }

    public function destroy($id){

        if(Auth::check()){
            $reply = Reply::where(['id'=>$id,'user_id'=>Auth::user()->id]);
            if($reply->delete()){
                return redirect()->back();
            }else{
                return redirect()->back();
            }
            return redirect()->back()->with('error','Somthing wrong');
        }
    }
}
