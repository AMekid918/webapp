<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){

        $posts = Post::with(['user', 'likes'])->orderBy('created_at', 'desc')->paginate(2);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request){

       
        $this-> validate($request, [
            'body' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();  

    
        $request->image->move(public_path('images'), $newImageName);

        
        //$post = Post::create([
        //    'body',
        //    'image_path' => $newImageName
        //]);

        $request->user()->posts()->create([
            'body' => $request->body,
            'image_path' => $newImageName
        ]);

        return back();
    }

    public function destroy(Post $post){

        $this->authorize('delete', $post);
        
        $post->delete();

        return back();
    }
}
