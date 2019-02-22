<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  </head>

  <body style="background-color:DodgerBlue;">
    <div class="container" >
<nav class="navbar navbar-default navbar-fixed-top " style="background-color:hsl(0, 0%,98%)">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">CREATEWEBSITE</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right" >
          <li><a href="/" style='margin-right:60px;'>HOME</a></li>
          <li><a href="/project" style='margin-right:60px;'>ENQUIRY LIST</a></li>
          <li><a href="{{'project/create'}}" style='margin-right:60px;'>CONTACT</a></li>

              @if (Route::has('login'))

                      @auth
                        <li>  <a style='margin-right:60px' href="{{ url('/home') }}">logout</a></li>
                      @else
                        <li>  <a style='margin-right:60px'href="login">Login</a></li>

                          @if (Route::has('register'))
                              <li><a href="{{ route('register') }}">Register</a></li>
                          @endif
                      @endauth

              @endif


          </div>


        </div>
        </ul>
      </div>
    </div>
  </nav>

<br><br>
<div>
@yield ('contains')
</div >
</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </body>
</html>
