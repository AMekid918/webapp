@extends('layouts.app')

@section('content')
    <div class= "flex justify-center">
        <div class = "w-5/12 bg-white p-6 rounded-lg">

            @auth
            <form action="{{route('updating', $post->id)}}" method="post" class="mr-2"">
                @csrf
                @method('PATCH')
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
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                        Post
                    </button>
                </div>
            </form>



            @endauth
            

            
        </form>
        </div>
    </div>


@endsection 