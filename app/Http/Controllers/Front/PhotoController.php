<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(){
        $photos = Photo::orderBy('id','desc')->paginate(4);
        return view('front.photo', compact('photos'));
    }
}
