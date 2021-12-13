 @extends('layouts.app')

@section('content')
    <div class= "flex justify-center">
        <div class = "w-5/12 bg-white p-6 rounded-lg">
        <form action="{{route('posts')}}" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30", rows="4" class="bg-grey-100
                border-1 w-full p-3 rounded-lg @error("body") border-red-500 @enderror"
                placeholder="Post something!"></textarea>

                @error('body')
                    <div class = "text-red-500 mt2 text-sm">
                        {{$message}}
                    </div>
                @enderror

            </div>

            <div>
                Add an image to your post:
                <input
                    type = "file"
                    class= "block shadow-5xl mb-5 mt-0 p-2 w-80 italic placeholder-grey-400"
                    name="image">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                    Post
                </button>
            </div>

        </form>

        @if ($posts->count())
            @foreach ($posts as $post)
                <x-post :post="$post"/>
            @endforeach

            {{$posts->links()}}

        @else
            <p>There are no posts</p>
        @endif
        </div>
    </div>


@endsection 