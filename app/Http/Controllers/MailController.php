<?php

namespace App\Http\Controllers;

use App\Mail\smtpmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class MailController extends Controller
{
 
    
    public function index()
    {
        return view('emails.index');
    }

    public function sendEmail(Request $request){

        
        $email = $request->input('email');   //$request->input('email');
       
        $details =[

            'title' => 'Mail from blah',
            'body' => 'this is blah',
            //'file' => $request->file('file')
        ];  
        //$pdf = PDF::loadView('test', $data);

        Mail::to($email)-> send(new smtpmail($details));
        return redirect()->back()->with('status','email sent');
        
    }
}
