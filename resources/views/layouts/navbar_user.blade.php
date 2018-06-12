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
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate ">
        <a class="navbar-brand" href="#">
          Blood Event </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
       <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a href="#pablo" class="nav-link " >
                     <i class="material-icons">
            apps</i> Browse Event
                    </a>
                  </li>
                @if(isset(Auth::user()->email))
               
                   <li class="dropdown button-container nav-item iframe-extern" >
                    
                   <a href="" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" rel="tooltip" title="" data-placement="top" data-original-title="{{Auth::user()->first_name}} {{Auth::user()->surname}}">
                      <div class="profile-photo-small">
                        <img src="./images/{{Auth::user()->photo}}" alt="Circle Image" class="rounded-circle img-fluid">  
                      </div>

                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right">

                      <h6 class="dropdown-header">Account Information</h6>
                      <a href="#pablo" class="dropdown-item">My Profile</a>
                      <a href="#pablo" class="dropdown-item">My Cards</a>
                      <a href="{{route('logout')}}" class="dropdown-item">Sign out</a>
                    </div>
                  </li>
                
                @else
                 <li class="nav-item">
                    <a href="/login" class="nav-link " >
                     <i class="material-icons">
            how_to_reg</i> Sign In
                    </a>
                  </li>
                  @endif
                </ul>
              </div>
    </div>
  </nav>

@show
@yield('content')
      
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