<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\WebsiteMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function forgetPassword(){

        return view('admin.forget_password');
    }

    public function forgetPassword_submit(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

      $admin_data = Admin::where('email',$request->email)->first();
      if(!$admin_data){
        return redirect()->back()->with('error','Email Address is not Found!');
      }

      $token = hash('sha256',time());
      $admin_data->token = $token;
      $admin_data->update();

      $reset_password = url('/admin/reset_password/'.$token.'/'.$request->email);
      $subject = 'Reset Password';
      $message = 'Please click on the following links:<br>';
      $message .= '<a href="'.$reset_password.'">Click here!</a>';

      Mail::to($request->email)->send(new WebsiteMail($subject,$message));
      return redirect()->route('admin_login')->with('success','Please following the next steps');
    }

    public function login_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard('admin')->attempt($credential)){
            return redirect()->route('admin_home');
        }else{
            return redirect()->route('admin_login')->with('error','Information is not correct');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function resetPassword($token,$email){
        $admin_data  =  Admin::where('token',$token)->where('email',$email)->first();
        if(!$admin_data){
            return redirect()->route('admin_login');
        }
        return view('admin.reset_password', compact('token','email'));
    }

    public function resetPasswordSubmit(Request $request){
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);
        $admin_data = Admin::where('token',$request->token)->where('email',$request->email)->first();
        $admin_data->password = Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();
        return redirect()->route('admin_login')->with('success','Password is Reset successfully');
    }
}
