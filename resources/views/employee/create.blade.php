@extends('layouts.frontend') @section('content')
<div class="container">
  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mt-4 card">
                <div class="card-header">
                    <h4>Employee<a href="{{url('employee')}}" class="btn btn-danger float-right">Back</a></h1><br></h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('insert_employee') }}" method="POSt">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                          </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Phone</label>
                          <input type="number" name="phone" class="form-control" id="exampleInputPhone1">
                        </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                      </form>               
                     </div>
            </div>
        </div>
    </div>
</div>
@endsection