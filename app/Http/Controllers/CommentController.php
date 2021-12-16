<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{



    public function index(Post $post){
        
        //$comments = $post->comments();
        $comments = Comment::where('post_id', $post->id)->get();
        return view('posts.postView', [
            'post'=>$post,
            'comments'=>$comments
        ]);

    }


    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Comment::create($input);
   
        return back();
    }    
}
