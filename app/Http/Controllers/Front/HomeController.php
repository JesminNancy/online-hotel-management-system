<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Post;
use App\Models\Room;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $all_slider = Slider::get();
        $all_feature = Feature::get();
        $testimonials = Testimonial::get();
        $posts = Post::orderBy('id','desc')->limit(3)->get();
        $rooms = Room::get();

        return view('front.home', compact('all_slider','all_feature','testimonials','posts','rooms'));
    }
}
