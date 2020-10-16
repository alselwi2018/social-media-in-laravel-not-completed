<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Comecloser</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <style>
      .side-sticky {
       position: fixed;
top: 51px;
bottom: 0;
left: 0;
z-index: 1000;
display: block;
padding: 20px;
overflow-x: hidden;
overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
background-color: #f5f5f5;
border-right: 1px solid #eee;
       }
   

    #wrapper {
  padding-left: 0;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}
#wrapper.toggled {
  padding-left: 250px;
}
#sidebar-wrapper {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 0;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: gray;
  color: #fff;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}
#wrapper.toggled #sidebar-wrapper {
  width: 250px;
}
#page-content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
}
#wrapper.toggled #page-content-wrapper {
  position: absolute;
  margin-right: -250px;
}
/* Sidebar Styles */

.sidebar-nav {
  position: absolute;
  top: 0;
  width: 250px;
  margin: 0;
  padding: 0;
  list-style: none;
}
.sidebar-nav li {
  text-indent: 20px;
  line-height: 40px;
}
.sidebar-nav li a {
  display: block;
  text-decoration: none;
  color:white;
}
.sidebar-nav li a:hover {
  text-decoration: none;
  color: #fff;
  background: rgba(255, 255, 255, 0.2);
}
.sidebar-nav li a:active,
.sidebar-nav li a:focus {
  text-decoration: none;
}
.sidebar-nav > .sidebar-brand {
  height: 65px;
  font-size: 18px;
  line-height: 60px;
}
.sidebar-nav > .sidebar-brand a {
  color: whitesmoke;
}
.sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
}
@media(min-width:768px) {
  #wrapper {
    padding-left: 250px;
  }
  #wrapper.toggled {
    padding-left: 0;
  }
  #sidebar-wrapper {
    width: 250px;
  }
  #wrapper.toggled #sidebar-wrapper {
    width: 0;
  }
  #page-content-wrapper {
    padding: 20px;
    position: relative;
  }
  #wrapper.toggled #page-content-wrapper {
    position: relative;
    margin-right: 0;
  }
  body{
    background-color: #f5f5f5;
  }
  .bg-pro{
    
background-image: url('@if(Auth()->user()){{asset("/storage/uploads/".Auth::user()->background)}}@else @endif');
/* Full height */
height: 100%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}
  }
}
a.no-underl:hover{
    color: whitesmoke;
}
.jumbotron{
  border-radius: 0 !important;
}
   </style>
</head>
<body class=" h-screen antialiased leading-none">
    <div id="app">
      
        <nav class="jumbotron  shadow  py-6 sticky-top" style="margin-bottom: 0;background-color:#4b49d1;" >
            @if(auth()->user())
            
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i style="font-size: 33px;color:white;" class="fa fa-bars" aria-hidden="true"></i></a>
              
            @endif
            
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center justify-center">
                    <div class="col-sm-9">                  
                         <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline d-flex">                         
                             </a> 
                    </div>
                    @guest
                    <div class="col-sm-3"> 
                    <a class="no-underline no-underl  text-white-300 text-sm p-3 " style="color: whitesmoke;" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline no-underl  text-white-300 text-sm p-3" style="color: whitesmoke;" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    </div>
                @endguest
                </div>
            </div>
        </nav>
        
       
        {{-- <div class="col-sm-1 " style="background-color: #f5f5f5;"></div> --}}
        
     
        @yield('content')
      
    </div>
    <script>
        $(document).ready(function(){
        $("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
        });
    </script>
</body>
</html>
