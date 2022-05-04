@extends('layouts.frontend') @section('content')
<div class="container">
     
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
            <div class="alert alert-success mt-5">{{ session('status') }}</div>
            @endif
            <div class="mt-4 card">
                <div class="card-header">
                    <h4>Employee<a href="{{url('posts')}}" class="btn btn-danger float-right">Back</a></h1><br></h4>
                </div>
                
                <div class="card-body">
                    <form action="{{ url('posts/'.$post->id) }}" method="POSt">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}" id="exampleInputEmail1">
                          </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea type="text" name="description" class="form-control" value="" id="exampleInputEmail1" >{!! $post->description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{ $post->status == 1? 'checked':''  }} id=""> 
                          </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                      </form>               
                     </div>
            </div>
        </div>
    </div>
</div>
@endsection