<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WebsiteMail;

class AdminSubscriberController extends Controller
{
    public function show(){
       $all_subscribers = Subscriber::where('status',1)->get();
       return view('admin.subscriber_show',compact('all_subscribers'));
    }
    public function send_email(){
        return view('admin.subscriber_send_email');
    }
    public function send_email_submit(Request $request){
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);
            // Send email
            $subject = $request->subject;
            $message = $request->message;
           $all_subscribers = Subscriber::where('status',1)->get();
            foreach($all_subscribers as $subscriber)
            {
                Mail::to($subscriber->email)->send(new WebsiteMail($subject,$message));
            }
         return response()->json(['code'=>1,'success_message'=>'Email is sent successfully']);
    }
}
