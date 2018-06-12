<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Blood Event / Home
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  <link href="{!! asset('vendor/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css">
  <!-- CSS Files --> 
  <link href="{!! asset('css/material-kit.css?v=2.0.3')!!}" rel="stylesheet" type="text/css">

</head>
@section('navbar')
  <body class="index-page sidebar-collapse">
   <nav class="navbar navbar-expand-lg bg-red">
            <div class="container">
              <div class="navbar-translate">
                <a class="navbar-brand" href="#">Blood Event</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item" >
                    <a href="#pablo" class="btn btn-rose btn-raised btn-round">
                      <i class="material-icons">home</i> Home
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#pablo" class="nav-link " >
                     <i class="material-icons">
                    how_to_reg</i> Sign In
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#pablo" class="nav-link">
                      <i class="material-icons">account_circle</i> Profile
                    </a>
                  </li>
                
                </ul>

              </div>
            </div>
          </nav>
<div class="page-header header-filter clear-filter " data-parallax="true" style="background-image: url('./banner/banner3.png');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1 class="title">Join Us to Save Lives !</h1>
            <button class="btn btn-white btn-raised btn-round btn-lg " onclick="location.href='/login';" >Get Started</button>
          </div>
        </div>
      </div>
       
    </div>
  </div>
   <footer class="footer" data-background-color="black">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            Connect with us
               </li>
          <li>
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Follow us on Instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
          <li>
             <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Like us on Facebook">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
        </ul>
      </nav>
@show
@yield('content')
      
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script> BloodEvent
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script  src="{!! asset('vendor/jquery/dist/jquery.min.js')!!}"></script>
  <script  src="{!! asset('js/popper.min.js')!!}"></script>
   <script  src="{!! asset('js/bootstrap-material-design.min.js')!!}"></script>
    <script  src="{!! asset('js/material-kit.js?v=2.0.3')!!}"></script>
  </body>
</html>