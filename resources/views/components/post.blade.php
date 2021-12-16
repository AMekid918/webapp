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


    <p class="mb-2 mt-2">"{{$post->body}}"</p>
    
        
    <div class="flex items-center">
        @auth 
            @if (!$post->likedBy(auth()->user()))
                <form action="{{route('posts.likes', $post->id) }}" method="post" class="mr-2"">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>

            @else
                <form action="{{route('posts.likes', $post->id) }}" method="post" class="mr-2"">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif 



            <form action="{{route('comments', $post) }}" method="get" class="mr-2">
                @csrf
                <button type="submit" class="text-blue-500">View Comments</button>
            </form>

        
        @endauth

        @can('delete', $post)
        <div>
            <form action="{{route('posts.destroy', $post) }}" method="post" class="mr-2"">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
            
        </div> 
        @endcan
        
        <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count()) }}</span>
    </div> 
    <hr />
</div>