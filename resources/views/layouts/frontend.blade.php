<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- styles --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
</head>
<body>
  <div>
      @include('layout.include.navbar')
      <br>
      @yield('content')
  </div>

  {{-- scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
  
  @if (session('Cant_delete'))
    <script>
      Swal.fire({ 
    title: 'Error!',
    text: 'You cant Delete other\'s Post',
    icon: 'error',
    confirmButtonText: 'Cool'
    });
    </script>
  @endif

  <script>
    $(document).ready( function () {
    $('#table_id').DataTable();
    select: true
      } );
    </script>
</body>
</html>