<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile($id) {
        $user = User::find($id);
        return view('profile', compact('user'));
    }
}
