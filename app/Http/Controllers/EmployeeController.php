<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use  Illuminate\Http\Response;
use \App\Http\Requests\storepostrequest ;
use Exception;
use Laravel\Ui\Presets\React;
use App\Mail\PasswordMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = employee::all();
        return view('employee.index',compact('employee'));
    }

    public function create()
    {
        $employee = employee::all();
        return view('employee.create');
    }

    public function insert(Request $request)
    {
       
  
        $user = DB::table('users')
                ->where('email', '=', $request->input('email'))
                ->get();

        
        //Check if the user exists
        if ((count($user)) > 0) {
            return redirect()->back()->withErrors(['email' => trans('User already exist')]);
        }
     
        
        $default_password = Str::random(6);
        $employee = new employee;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->password = $default_password;
        try{
            $details =[
                'title' => 'Mail from blah',
                'body' => 'this is blah',
                'password' => $default_password 
            ];  
            Mail::to($employee->email)-> send(new PasswordMail($details));
        }catch(Exception $e){
                echo $e;
        }
        $employee->save();
        return redirect('employee')->with('status','Email sent and Employee added successfully');
    }

    public function edit($id)
    {
        $employee = employee::find($id);
        return view('employee.edit',compact('employee'));
    }

    public function update(Request $request,$id)
    {

       

        $employee = employee::find($id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->status = $request->input('status')== true ? '1':'0'; 
        $employee->update();
        return redirect('employee')->with('status','Employee Updated successfully');
    }

    public function delete($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return redirect('employee')->with('status','Employee deleted successfully');
    }
}
