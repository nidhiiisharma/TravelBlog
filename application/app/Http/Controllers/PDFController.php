<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use PDF;
use App\Post;
class PDFController extends Controller
{
    public function getPDF(){
        $posts=Post::all();
        $pdf=PDF::loadView('pdf.post',['posts'=>$posts]);
        return $pdf->download('post.pdf');
    }
}
