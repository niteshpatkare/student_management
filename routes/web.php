<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('task');
});

// Route::get('/hello',function(){
//     return 'Hello Trying some Routes function';
// });

// Route::get('/user/{id}',[UserController::class,'showProfile']);

