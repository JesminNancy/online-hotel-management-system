<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('admin.post_view', compact('posts'));
    }
    public function add(){
        return view('admin.post_add');
    }
    public function store(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required'
        ]);
        $ext = $request->file('photo')->getClientOriginalExtension();
        $image_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$image_name );
        $obj = new Post();
        $obj->photo = $image_name;
        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->total_view = 1;
        $obj->save();

        return redirect()->back()->with('success','Post is added successfully');
    }
    public function edit($id){

        $post_data = Post::where('id',$id)->first();

        return view('admin.post_edit', compact('post_data'));
    }

public function update(Request $request,$id){

    $post_update = Post::where('id',$id)->first();
    if($request->hasFile('photo')){
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        unlink(public_path('uploads/'.$post_update->photo));

        $ext = $request->file('photo')->Extension();
        $image_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$image_name );
        $post_update->photo = $image_name;
    }

    $post_update->heading = $request->heading;
    $post_update->short_content = $request->short_content;
    $post_update->content = $request->content;
    $post_update->update();

    return redirect()->back()->with('success','Post is updated successfully');
}

    public function delete($id){
       $single_post = Post::where('id',$id)->first();
    //    unlink(public_path('uploads/'.$single_post->photo));
       $single_post->delete();
       return redirect()->back()->with('success','Post deleted successfully');
    }
}
