<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    public function index(){
        $sliders = Slider::get();
        return view('admin.slide_view', compact('sliders'));
    }
    public function add(){
        return view('admin.slide_add');
    }

    public function store(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);
        $ext = $request->file('photo')->getClientOriginalExtension();
        $image_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$image_name );
        $obj = new Slider();
        $obj->photo = $image_name;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->save();

        return redirect()->back()->with('success','Slider added successfully');
    }
    public function edit($id){

        $slider_data = Slider::where('id',$id)->first();

        return view('admin.slide_edit', compact('slider_data'));
    }

public function update(Request $request,$id){

    $slider_update = Slider::where('id',$id)->first();
    if($request->hasFile('photo')){
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        unlink(public_path('uploads/'.$slider_update->photo));

        $ext = $request->file('photo')->Extension();
        $image_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$image_name );
        $slider_update->photo = $image_name;
    }

    $slider_update->heading = $request->heading;
    $slider_update->text = $request->text;
    $slider_update->button_text = $request->button_text;
    $slider_update->button_url = $request->button_url;
    $slider_update->update();

    return redirect()->back()->with('success','Slider updated successfully');
}

public function delete($id){

       $single_data = Slider::where('id',$id)->first();
       $single_data->delete();
       return redirect()->back()->with('success','Slider deleted successfully');
}
}
