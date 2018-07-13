<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
 <link rel="shortcut icon" href="{{{ asset('banner/icon.png') }}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Blood Event
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  <link href="{!! asset('vendor/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css">
  <!-- CSS Files --> 
  <link href="{!! asset('css/material-kit.css?v=2.0.3')!!}" rel="stylesheet" type="text/css">

</head>

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
                    <a href="/home" class="nav-link " >
                     <i class="material-icons">
            apps</i> Browse Event
                    </a>
                  </li>
                   @if(isset(Auth::user()->email)  && Auth::user()->role == "User")
                   <li class="dropdown button-container nav-item iframe-extern" >
                   <a href="" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" rel="tooltip" title="" data-placement="top" data-original-title="{{Auth::user()->first_name}} {{Auth::user()->surname}}">
                      <div class="profile-photo-small">
                        <img src="./images/{{Auth::user()->photo}}" alt="Circle Image" class="rounded-circle img-fluid">  
                      </div>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                      <h6 class="dropdown-header">Account Information</h6>
                      <a href="{{route('users.profile')}}" class="dropdown-item">My Profile</a>
                      <a href="{{route('logout')}}" class="dropdown-item">Sign out</a>
                    </div>
                  </li>
                 @elseif(isset(Auth::user()->email) && Auth::user()->role == "Admin")
                 <li class="dropdown button-container nav-item iframe-extern" >
                    
                   <a href="" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" rel="tooltip" title="" data-placement="bottom" data-original-title="{{Auth::user()->first_name}} {{Auth::user()->surname}}">
                      <div class="profile-photo-small">
                        <img src="/images/{{Auth::user()->photo}}" alt="Circle Image" class="rounded-circle img-fluid">  
                      </div>

                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right">

                      <h6 class="dropdown-header">Account Information</h6>
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
<div class="page-header  clear-filter " data-parallax="true" style="background-image: url('./banner/banner3.png');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1 class="title">Join Us to Save Lives !</h1>
            <button class="btn btn-white btn-raised btn-round btn-lg " onclick="location.href='/register';" >Get Started</button>
          </div>
        </div>
      </div>
       
    </div>
  </div>
<br>
  <div class="main main-raised">
      <div class="section section-basic">
        <div class="features-1">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Why Donating Blood ? </h2>
                        <h5 class="description">Blood donation not only makes the receiver’s life good but also helps the donor to maintain good health</h4>
                    </div>
                </div>
                <div class="row">
                  
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">check_circle_outline</i>
                            </div>
                            <h4 class="info-title">Prevents Hemochromatosis</h4>
                            <p class="text-justify">Health benefits of blood donation include reduced risk of hemochromatosis. Hemochromatosis is a health condition that arises due to excess absorption of iron by the body. This may be inherited or may be caused due to alcoholism, anemia or other disorders. Regular blood donation may help in reducing iron overload.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">check_circle_outline</i>
                            </div>
                            <h4 class="info-title">Anti-cancer Benefits</h4>
                            <p class="text-justify">Blood donation helps in lowering the risk of cancer.By donating blood the iron stores in the body are maintained at healthy levels. A reduction in the iron level in the body is linked with low cancer risk.</p>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">check_circle_outline</i>
                            </div>
                            <h4 class="info-title">Weight loss</h4>
                            <p class="text-justify">Regular blood donation reduces the weight of the donors. This is helpful for those who are obese and are at a higher risk of cardiovascular diseases and other health disorders.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">check_circle_outline</i>
                            </div>
                            <h4 class="info-title">Maintains Healthy Heart & Liver</h4>
                            <p class="text-justify">Blood donation is beneficial in reducing the risk of heart and liver ailments caused by the iron overload in the body. Blood donation helps in maintaining the iron levels and reduces the risk of various health ailments.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">check_circle_outline</i>
                            </div>
                            <h4 class="info-title">Stimulates Blood Cell Production</h4>
                            <p class="text-justify">After donating blood, the body works to replenish the blood loss. This stimulates the production of new blood cells and, in turn, helps in maintaining good health.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="card card-pricing card-raised bg-rose">
                           <div class="card-body">
                                <h3 class="card-title">So, what are you waiting for ? </h3>
                                <h4 class="card-description">
                                Join us and get all those benefits ! 
                                </h4>
                            </div>
                            <div class="card-footer justify-content-center">
                                <button class="btn btn-white btn-raised btn-round btn-lg " onclick="location.href='/register';" >Join Us !</button>
                            </div> 
                        </div>
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