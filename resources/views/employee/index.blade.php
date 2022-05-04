@extends('layouts.frontend')

@section('content')
<div class="container">
    @if(session('status'))
        <div class="alert alert-success mt-5">{{ session('status') }}</div>
    @endif
<h1> Employees
    <a href="{{url('add_employee')}}" class="btn btn-primary">ADD</a></h1><br>
<div class="container">
    <div class="row">
    <table class="table col-12">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach($employee as $employeedata)
            
        <tr>
            <th scope="row">{{$employeedata->id}}</th>
            <td>{{$employeedata->name}}</td>
            <td>{{$employeedata->email}}</td>
            <td>{{$employeedata->phone}}</td>
            <td>{{$employeedata->status}}</td>
            <td> <a href="{{ url('edit_employee/'.$employeedata->id) }}" class="btn btn-primary">Edit</a></td>
            <td> <a href="{{ url('delete_employee/'.$employeedata->id) }}" class="btn btn-danger">Delete</a></td>
        </tr>    
            @endforeach
      </tbody>
  </table>
    </div>
</div>
  {{-- <h1>{{$user?? ''}}</h1> --}}
</div>
  @endsection
  