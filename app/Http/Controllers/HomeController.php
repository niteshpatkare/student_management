<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $name = 'Nitesh';
        return view('Welcome',compact('name'));
        
    }
}
