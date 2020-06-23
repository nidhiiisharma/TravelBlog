<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;
use App\User;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To Our Application!';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function destinations(){
        $title = 'Where are you going?';
        return view('pages.destinations')->with('title', $title);
    }
  
}
