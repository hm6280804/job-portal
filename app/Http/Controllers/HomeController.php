<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //this method will shwo the home page
    public function index(){
        return view('front.home');
    }
}
