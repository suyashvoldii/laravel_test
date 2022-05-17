<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use  Illuminate\Http\Response;
use \App\Http\Requests\storepostrequest ;
use Laravel\Ui\Presets\React;

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
       
 
        // Retrieve a portion of the validated input data...
        

        $employee = new employee;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();
        return redirect()->back()->with('status','Employee added successfully');
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
