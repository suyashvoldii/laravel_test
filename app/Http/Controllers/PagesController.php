<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        return view('about');
    }


    public function user($id,$name) 
    {

        $user = 'This is '.$name.', id:'.$id;
        return view('user',compact('user'));
      
    }
}