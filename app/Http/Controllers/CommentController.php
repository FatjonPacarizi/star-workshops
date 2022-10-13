<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

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
            return redirect()->back();
        }
    }

    public function destroy($comment){
        
        $comment = Comment::find($comment);
        $comment->delete();

         return redirect()->back();
    }
}
