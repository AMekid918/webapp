<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

Route::get('/posts', function () {
    return view('posts.index');
});

//Route::get('/home',function(){
    

Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');