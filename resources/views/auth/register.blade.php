
@extends('layouts.app')

@section('content')
    <div class= "flex justify-center">
        <div class = "w-8/12 bg-white p-6 rounded-lg">
        <form action="{{route('register')}}" method = "post">

            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type = "text" name="name" id = "name" placeholder="Your name"
                class ="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>

            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type = "text" name="username" id = "username" placeholder="Username"
                class ="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type = "email" name="email" id = "email" placeholder="Email"
                class ="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type = "password" name="password" id = "password" placeholder="Password"
                class ="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>

            <div class="mb-4">
                <label for="password_confirm" class="sr-only">Re-enter Password</label>
                <input type = "password" name="password_confirm" id = "password_confirm" placeholder="Re-enter Password"
                class ="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register

                </button>
            </div>

            </form> 
        </div>

    </div>


@endsection