<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $title = 'This is services Page';

        return view('layouts.services')->with('title', $title);
    }
    public function services(){
        $data = array(
            'title' => 'Services Page List',
            'services' => ['web','design','white hacker']
            );
        return view('layouts.services')->with($data);

    }
}
