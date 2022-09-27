<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Requset $request){
        
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
                return 1;
            }else{
                return 2;
            }
        }else{

        }
        return 3;
    }
}
