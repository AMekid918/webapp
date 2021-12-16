@extends('layouts.app')
   
@section('content')
<div class= "flex justify-center">
    <div class = "w-8/12">

        <div class="bg-white p-6 rounded-lg">


            <x-post :post="$post" />
            <hr />
            <h1 class="text-2xl mt-5 mb-10">Comments</h1>
            @if ($comments->count())
                @foreach ($comments as $comment)
                    <div class="mb-4">
                        <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->name}} </a><span class="text-grey-600 text-sm">
                            {{$post->created_at->diffForHumans()}} </span>
                        </a>
                        <p class="mb-2 mt-4">"{{$comment->body}}"</p>

                    </div>
                @endforeach
                
            @else 
                <p class="mb-4">There are no comments yet!</p>
            @endif 

            <hr />
            <h4 class="text-2xl mt-5 mb-5">Add comment</h4>

            <form action="{{route('comments', $post->id)}}" method="post" class="mr-2 mt-2">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="body" class="form-control" />
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                </div>
                <div class="mb-3">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30", rows="4" class="bg-grey-100
                    border-1 w-full p-3 rounded-lg @error("body") border-red-500 @enderror"
                    placeholder="Post a comment!"></textarea>

                    @error('body')
                        <div class = "text-red-500 mt2 text-sm">
                            {{$message}}
                        </div>
                    @enderror

                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                        Post
                    </button>
                </div>
            </form>
            

        </div>
    </div>
</div>


@endsection