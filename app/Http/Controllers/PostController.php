<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function index(){

        $posts = Post::with(['user', 'likes'])->orderBy('created_at', 'desc')->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function goto(Post $post){
        $posts = Post::where('id', $post->id)->get();

        return view('posts.update');
    }




    public function store(Request $request){

       
        $this-> validate($request, [
            'body' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        if ($request->image != null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();  
            $request->image->move(public_path('images'), $newImageName);

            $request->user()->posts()->create([
                'body' => $request->body,
                'image_path' => $newImageName
            ]);
        }
        else{
            $request->user()->posts()->create([
                'body' => $request->body,
                'image_path' => ''
            ]);
        }

        
        //$post = Post::create([
        //    'body',
        //    'image_path' => $newImageName
        //]);

        

        return back();
    }


    public function show(Post $post){
        return view('posts.postView', [
            'post'=>$post
        ]);
    }


    public function update(Post $id){

        dd('hello');
    }




    public function destroy(Post $post){

        $this->authorize('delete', $post);
        
        $post->delete();

        return back();
    }
}
