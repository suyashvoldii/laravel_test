@extends('layouts.frontend')

@section('content')
@if(session('status'))
<div class="alert alert-success mt-5">{{ session('status') }}</div>
@endif
<form action="{{ url('send_mail') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <label>TO:</label>
        <input type="text" name="email"><br><br>
        <input type="file" name="file"><br><br>

        <button type="submit" class="btn btn-primary ">Submit</button>
        </form>
        @endsection
  
