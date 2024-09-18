<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('task');
});

// Route::get('/hello',function(){
//     return 'Hello Trying some Routes function';
// });

// Route::get('/user/{id}',[UserController::class,'showProfile']);

// Route::get('/student-search', function (Request $request) {
//     $search = $request->input('search');
    
//     if ($search) {
//         $students = Student::where('name', 'LIKE', '%' . $search . '%')->get();
//     } else {
//         // If no search query, return all students
//         $students = Student::all();
//     }
    
//     // Return a view and pass the students to the view
//     return view('student', ['students' => $students]);
// });

