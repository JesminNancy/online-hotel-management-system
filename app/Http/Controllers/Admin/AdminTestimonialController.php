<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::get();
        return view('admin.testimonial_view', compact('testimonials'));
    }
    public function add(){
        return view('admin.testimonial_add');
    }

    public function store(Request $request){

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);
        $ext = $request->file('photo')->getClientOriginalExtension();
        $image_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$image_name );
        $obj = new Testimonial();
        $obj->photo = $image_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();
        return redirect()->back()->with('success','Testimonial added successfully');

    }
    public function edit($id){

        $testimonial_data = Testimonial::where('id',$id)->first();

        return view('admin.testimonial_edit', compact('testimonial_data'));
    }

    public function update(Request $request,$id){

        $testimonial_update = Testimonial::where('id',$id)->first();
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            unlink(public_path('uploads/'.$testimonial_update->photo));

            $ext = $request->file('photo')->Extension();
            $image_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$image_name );
            $testimonial_update->photo = $image_name;
        }

        $testimonial_update->name = $request->name;
        $testimonial_update->designation = $request->designation;
        $testimonial_update->comment = $request->comment;
        $testimonial_update->update();

        return redirect()->back()->with('success','Testimonial is updated successfully');
    }
    public function delete($id){

        $single_data = Testimonial::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();
        return redirect()->back()->with('success','Slider deleted successfully');
 }
}
