<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index(){
        $setting_data = Setting::where('id',1)->first();
        return view('admin.setting',compact('setting_data'));
    }
    public function update(Request $request){

        $obj = Setting::where('id',1)->first();
        if($request->hasFile('logo')){
            $request->validate([
                'logo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);
            unlink(public_path('uploads/'.$obj->logo));
            $ext = $request->file('logo')->Extension();
            $image_name = time().'.'.$ext;
            $request->file('logo')->move(public_path('uploads/'),$image_name );
            $obj->logo = $image_name;
        }
        if($request->hasFile('fevicon')){
            $request->validate([
                'fevicon' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);
            unlink(public_path('uploads/'.$obj->fevicon));
            $ext = $request->file('fevicon')->Extension();
            $image_name = time().'.'.$ext;
            $request->file('fevicon')->move(public_path('uploads/'),$image_name );
            $obj->fevicon = $image_name;
        }
        $obj->top_bar_phone = $request->top_bar_phone;
        $obj->top_bar_email = $request->top_bar_email;
        $obj->home_feature_status = $request->home_feature_status;
        $obj->home_room_total = $request->home_room_total;
        $obj->home_room_status = $request->home_room_status;
        $obj->home_testimonial_status = $request->home_testimonial_status;
        $obj->home_latest_post_total = $request->home_latest_post_total;
        $obj->home_latest_post_status = $request->home_latest_post_status;
        $obj->footer_address = $request->footer_address;
        $obj->footer_phone = $request->footer_phone;
        $obj->footer_email = $request->footer_email;
        $obj->copyright = $request->copyright;
        $obj->facebook = $request->facebook;
        $obj->twitter = $request->twitter;
        $obj->linkedin = $request->linkedin;
        $obj->pinterest = $request->pinterest;
        $obj->theme_color_1 = $request->theme_color_1;
        $obj->theme_color_2 = $request->theme_color_2;
        $obj->analytic_id = $request->analytic_id;
        $obj->update();

        return redirect()->back()->with('success','Setting is updated successfully');
    }
}
