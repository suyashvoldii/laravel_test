<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- styles --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" >
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
</head>
<body>
  <div>
      @include('layout.include.navbar')
      <br>
      @yield('content')
  </div>
 

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ asset('frontend/js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.js') }}"></script> --}}
</body>
</html>