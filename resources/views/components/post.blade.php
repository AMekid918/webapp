@props(['post'=> $post])


<div class="mb-4">
    

    <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->name}} </a><span class="text-grey-600 text-sm">
        {{$post->created_at->diffForHumans()}} </span>

    <img
        class="mt-4"
        src="{{ asset('images/' . $post->image_path)}}"
        width='500'
        height=auto
        alt="">


    <p class="mb-2 mt-4">"{{$post->body}}"</p>
    
        @can('delete', $post)
        <div>
            <form action="{{route('posts.destroy', $post) }}" method="post" class="mr-1"">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        </div> 
        @endcan
    <div class="flex items-center">
        @auth 
            @if (!$post->likedBy(auth()->user()))
                <form action="{{route('posts.likes', $post->id) }}" method="post" class="mr-1"">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>

            @else
                <form action="{{route('posts.likes', $post->id) }}" method="post" class="mr-1"">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif 

        @endauth
        <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count()) }}</span>
    </div> 
</div>