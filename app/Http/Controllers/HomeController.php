<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = "Welcome to HRMS ICTA";
//        return view(' home', compact('title'));
        return view(' home')->with('title',$title);
    }

/*public function index(){
    $data = array(
        'title' => 'welcome to ICTA`s HRMS',
    );
    return view('home')->with($data);
}*/
}
