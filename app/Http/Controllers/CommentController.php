<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Reply;

class CommentController extends Controller
{
    public function store(Request $request){

        if(Auth::check()){
            Comment::create([
                'name' => Auth::user()->name,
                'comment'=> $request->input('comment'),
                'user_id' => Auth::id(),
                'streaming_id' => $request->input('streaming_id')
            ]);
            
            return redirect()->back()->with('success','Comment Added successfully..!');
        }else{
            return back()->withInput()->with('error','Somthing wrong');
        }
    }

    public function destroy(Comment $comment){

        if(Auth::check()){

            $reply = Reply::where(['comment_id'=>$comment->id]);
            $comment = Comment::where(['user_id'=>Auth::user()->id, 'id'=>$comment->id]);
            if($reply->count() > 0 && $comment->count() > 0 ) {
                $reply->delete();
                $comment->delete();
                return redirect()->back();
            }else if($comment->count() > 0 && $comment !== Auth::id()){
                $comment->delete();
                return redirect()->back();
            }else{
                return redirect()->back()->with('error','Somthing wrong');
            }
        }
    }
}
