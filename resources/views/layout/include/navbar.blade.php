<div class="container-fluid pr-5 pl-5 bg-black">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('about')}}">About us</a>
        </li>
       
   
        <li class="nav-item">
          <a class="nav-link" href="{{url('posts')}}">posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('to_mail')}}">contact us</a>
        </li>
        @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        @else 
        @if(Auth::user()->role == 1)
        <li class="nav-item">
          
          <a class="nav-link" href="{{url('employee')}}">Employee</a>
        </li>
        @endif
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"  aria-expanded="false" >
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none mr-4">
                    @csrf
                </form>
            </div>
        </li>
        @endguest    
      </ul>
    </div>
  </nav>
</div>