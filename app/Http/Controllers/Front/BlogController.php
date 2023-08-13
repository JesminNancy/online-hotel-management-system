<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->paginate(2);
        return view('front.blog', compact('posts'));
    }

    public function singlePost($id){
       $single_post = Post::where('id',$id)->first();
       $single_post->total_view = $single_post->total_view + 1;
       $single_post->update();

     return view('front.post', compact('single_post'));
    }
}
