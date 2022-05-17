@extends('layouts.frontend')

@section('content')
<div class="container">
    @if (session('cant_delete'))
    <script>
    myFunction();
    function myFunction() {
      Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'error',
  confirmButtonText: 'Cool'
})
    }
    </script>
    @endif
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }} 
    </div>
@endif
<h1> Posts
    <a href="{{url('posts/create')}}" class="btn btn-primary">ADD</a></h1><br>
    <div class="container">
        <div class="row">
        <table class="table col-12">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Creator</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($post as $postdata)
            <tr>
              <th scope="row">{{$postdata->id}}</th>
                <td>{{$postdata->name}}</td> 
              <td>{{$postdata->title}}</td>
              <td>{{$postdata->description}}</td>
              <td> <a href="{{ url('posts/'.$postdata->id.'/edit') }}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ url('posts/'.$postdata->id) }}" method="POST">  
                    @csrf
                    @method('DELETE')
                    <button href="" class="btn btn-danger">Delete</button></form>
                </td>
            </tr>    
                @endforeach
          </tbody>
      </table>
        </div>
    </div>
</div>

@endsection
