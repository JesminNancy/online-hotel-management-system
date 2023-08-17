<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\WebsiteMail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Hash;

class SubscriberController extends Controller
{
    public function send_email(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
        ]);

        if(!$validator->passes()) {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        } else {

            $token = Hash('sha256',time());
            $obj = new Subscriber();
            $obj->email = $request->email;
            $obj->token = $token;
            $obj->status = 0;
            $obj->save();

            $verification_link = url('subscribe/verify/'.$request->email.'/'.$token);

             // Send email
             $subject = 'Subscriber Verification';
             $message = 'Please check to the link below confirmation of subscriber : <br>';
             $message .= '<a href="'.$verification_link.'">';
             $message .= $verification_link;
             $message .= '</a>';



             Mail::to($request->email)->send(new WebsiteMail($subject,$message));

            return response()->json(['code'=>1,'success_message'=>'Please check your email to confirm subscription']);
        }
    }
    public function verify($email,$token){
      $subscriber_data =  Subscriber::where('email',$email)->where('token',$token)->first();

      if($subscriber_data ){
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();
            return redirect()->back()->with('success','Your subscription is verified successfully!');
        }else{
            return redirect()->route('home');
      }
    }
}
