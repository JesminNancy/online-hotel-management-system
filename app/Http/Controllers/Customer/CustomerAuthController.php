<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\WebsiteMail;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CustomerAuthController extends Controller
{
    public function login(){
        return view('front.login');
    }
    public function login_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ];

        if(Auth::guard('customer')->attempt($credential)){
            return redirect()->route('customer_home');
        }else{
            return redirect()->route('customer_login')->with('error','Information is not correct');
        }
    }
    public function signup(){
        return view('front.signup');
    }
    public function signup_submit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

            $token = hash('sha256', time());
            $password = Hash::make($request->password);
            $verification_link = url('signup-verify/'.$request->email.'/'.$token);
            $obj = new Customer();
            $obj->name = $request->name;
            $obj->email = $request->email;
            $obj->password = $password;
            $obj->token = $token;
            $obj->status = 0;
            $obj->save();

             // Send email
             $subject = 'Subscriber Verification';
             $message = 'Please check to the link below confirmation of subscriber : <br>';
             $message .= '<a href="'.$verification_link.'">';
             $message .= $verification_link;
             $message .= '</a>';



             Mail::to($request->email)->send(new WebsiteMail($subject,$message));


        return redirect()->back()->with('success','Complete the signup,please check your email and Click on the link');
    }

    public function verify($email,$token){
        $customer_data =  Customer::where('email',$email)->where('token',$token)->first();
        if($customer_data){
            $customer_data->token = '';
            $customer_data->status = 1;
            $customer_data->update();
              return redirect()->back()->with('success','Your signup is verified successfully!');
          }else{
              return redirect()->route('customer_login');
        }
    }
    public function logout(){
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login');
    }

    public function forget_password(){

        return view('front.forget_password');
    }

    public function forget_password_submit(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

      $admin_data = Customer::where('email',$request->email)->first();
      if(!$admin_data){
        return redirect()->back()->with('error','Email Address is not Found!');
      }

      $token = hash('sha256',time());
      $admin_data->token = $token;
      $admin_data->update();

      $reset_password = url('/reset-password/'.$token.'/'.$request->email);
      $subject = 'Reset Password';
      $message = 'Please click on the following links:<br>';
      $message .= '<a href="'.$reset_password.'">Click here!</a>';

      Mail::to($request->email)->send(new WebsiteMail($subject,$message));
      return redirect()->route('customer_login')->with('success','Please following the next steps');
    }
    public function reset_password($token,$email){

         $customer_data  =  Customer::where('token',$token)->where('email',$email)->first();
        if(!$customer_data){
            return redirect()->route('customer_login');
        }
        return view('front.reset_password', compact('token','email'));
    }

    public function reset_password_submit(Request $request){
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);
        $admin_data = Customer::where('token',$request->token)->where('email',$request->email)->first();
        $admin_data->password = Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();
        return redirect()->route('customer_login')->with('success','Password is Reset successfully');
    }
}
