<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::orderBy('id','desc')->paginate(12);
        return view('front.video', compact('videos'));
    }
}
