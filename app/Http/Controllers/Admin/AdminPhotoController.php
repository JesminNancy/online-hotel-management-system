<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
    public function index(){
        $photos = Photo::get();
        return view('admin.photo_view', compact('photos'));
    }
    public function add(){
        return view('admin.photo_add');
    }
    public function store(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);
        $ext = $request->file('photo')->getClientOriginalExtension();
        $image_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$image_name );

        $obj = new Photo();
        $obj->photo = $image_name;
        $obj->caption = $request->caption;
        $obj->save();

        return redirect()->back()->with('success','Photo is added successfully');
    }
    public function edit($id){

        $photo_data = Photo::where('id',$id)->first();

        return view('admin.photo_edit', compact('photo_data'));
    }

public function update(Request $request,$id){

    $photo_update = Photo::where('id',$id)->first();
    if($request->hasFile('photo')){
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        unlink(public_path('uploads/'.$photo_update->photo));

        $ext = $request->file('photo')->Extension();
        $image_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$image_name );
        $photo_update->photo = $image_name;
    }

    $photo_update->caption = $request->caption;
    $photo_update->update();

    return redirect()->back()->with('success','Photo is updated successfully');
}
public function delete($id){
    $single_data = Photo::where('id',$id)->first();
    unlink(public_path('uploads/'.$single_data->photo));
    $single_data->delete();
    return redirect()->back()->with('success','Photo is deleted successfully');
}

}
