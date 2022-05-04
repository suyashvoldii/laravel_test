@extends('layouts.frontend') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mt-4 card">
                <div class="card-header">
                    <h4>Edit Employee<a href="{{url('employee')}}" class="btn btn-danger float-right">Back</a></h1><br></h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('update_employee/'.$employee->id) }}" method="POSt">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" value="{{ $employee->name }}" class="form-control" id="exampleInputEmail1">
                          </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="email" value="{{ $employee->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Phone</label>
                          <input type="number" name="phone" value="{{ $employee->phone }}" class="form-control" id="exampleInputPhone1">
                        </div>
                         <div class="form-group">
                          <label for="">Status</label>
                          <input type="checkbox" name="status" {{ $employee->status == 1 ? 'checked':"" }}  id=""> 
                        </div>
                        <button type="submit" class="btn btn-primary ">Update</button>
                      </form>               
                     </div>
            </div>
        </div>
    </div>
</div>
@endsection