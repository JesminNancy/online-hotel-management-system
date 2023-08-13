<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $all_slider = Slider::get();
        $all_feature = Feature::get();
        $testimonials = Testimonial::get();
        return view('front.home', compact('all_slider','all_feature','testimonials'));
    }
}
