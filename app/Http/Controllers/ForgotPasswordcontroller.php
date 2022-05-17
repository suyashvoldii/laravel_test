<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Mail\MailResetRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordcontroller extends Controller
{

  
    public function index(){
        return view('Myauth.index');
    }

    public function validatePasswordRequest(Request $request){

        $request->validate(['email' => 'required|email']);
        
        $user = DB::table('users')
                ->where('email', '=', $request->email)
                ->get();

        
        //Check if the user exists
        if ((count($user)) < 1) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }
        $token = Str::random(40);
        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {    
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    private function sendResetEmail($email, $token)
    {
    //Retrieve the user from the database
    $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();
    //Generate, the password reset link. The token generated is embedded in the link
    $link = 'http://127.0.0.1:8000/' . 'password/reseting/' . $token . '?email=' . urlencode($user->email);
    
        try {
        //Here send the link with CURL with an external email API 
       // Route::redirect('password/resets', '/send_mail');
      
       
  //$request->input('email');
       
       $details =[

           'title' => 'Mail from blah',
           'body' => 'this is blah',
           'link' => $link, 
           'file' => null  
       ];  
       //$pdf = PDF::loadView('test', $data);

       Mail::to($email)-> send(new MailResetRequest($details));
       return true;
         
        } catch (Exception $e) {
            return $e;
        }
    }

    public function resetPassword(Request $request){
      
            $token = $request->route()->parameter('token');
            return view('Myauth.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request){
      
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token' => 'required' ]);

    //check if payload is valid before moving on
   

    $password = $request->password;
    // Validate the token
    $tokenData = DB::table('password_resets')
    ->where('token', $request->token)->first();
    // Redirect the user back to the password reset request form if the token is invalid
    if (!$tokenData) return view('Myauth.index');

    $user = User::where('email', $tokenData->email)->first();
    // Redirect the user back if the email is invalid
    if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
    //Hash and update the new password
    $user->password = \Hash::make($password);
    $user->update(); //or $user->save();

    //login the user immediately they change password successfully
    //Auth::login($user);

    //Delete the token
    DB::table('password_resets')->where('email', $user->email)
    ->delete();

    //Send Email Reset Success Email
    if ($this->sendSuccessEmail($tokenData->email)) {
        Auth::login($user);
        return redirect('/')->with('status', 'password reseted');

    } else {
        return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
    }
    }

    private function sendSuccessEmail($email)
    {
    //Retrieve the user from the database
    $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();
   
        try {
     //$request->input('email');
       $details =[

           'title' => 'Password_changed',
           'body' => 'this is blah',
           'file' => null  ,
           'link' => null
       ];  
       //$pdf = PDF::loadView('test', $data);

       Mail::to($email)-> send(new MailResetRequest($details));
       return true;
         
        } catch (Exception $e) {
            return $e;
        }
    }




    
}

