<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;



Route::get('/posts', function () {
    return view('posts.index');
});

//Route::get('/home',function(){
    

Route::get('/register', [RegistrationController::class, 'index'])->name('register');