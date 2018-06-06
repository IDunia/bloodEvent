@if(isset(Auth::user()->email) && (Auth::user()->role == 'Admin')) 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('vendor/bootstrap/dist/css/bootstrap.min.css')!!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('css/AdminLTE.min.css')!!}" rel="stylesheet">
   <link href="{!! asset('css/skins/_all-skins.min.css')!!}" rel="stylesheet">
   <link href="{!! asset('vendor/Ionicons/css/ionicons.min.css')!!}" rel="stylesheet">
   
    <!-- Custom Fonts -->
    <link href="{!! asset('vendor/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css">
    
    <!-- DataTables CSS -->
    <link href="{!! asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css')!!}" rel="stylesheet">
    
    <!--JS -->
   <!-- jQuery -->
    <script  src="{!! asset('vendor/jquery/dist/jquery.min.js')!!}"></script>
  <script  src="{!! asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js')!!}"></script>
   <script  src="{!! asset('vendor/fastclick/lib/fastclick.js')!!}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('vendor/bootstrap/dist/js/bootstrap.min.js')!!}"></script>
 
    <!-- DataTables JavaScript -->
    <script src="{!! asset('vendor/datatables.net/js/jquery.dataTables.min.js')!!}"></script>
    <script src="{!! asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js')!!}"></script>
   
    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('js/adminlte.min.js')!!}"></script>    
    <!-- Datetimepicker CSS + JS -->

        <link href="{!! asset('datetime-picker/bootstrap-datetimepicker.min.css')!!}" rel="stylesheet">

     <script src="{!! asset('datetime-picker/bootstrap-datetimepicker.js')!!}"></script>
     <script src="{!! asset('datetime-picker/bootstrap-datetimepicker.min.js')!!}"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">   
</head>
@section('navbar')
<body class="hold-transition skin-red sidebar-mini">


            <!-- Navigation -->

    <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>bEv</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>blood</b>Event</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="/images/{{Auth::user()->photo}}"  class="user-image" alt="User Image" />
              <span class="hidden-xs">{{Auth::user()->email}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/images/{{Auth::user()->photo}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->first_name}} {{Auth::user()->surname}}
                  <small>{{Auth::user()->role}}</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('admin.profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/images/{{Auth::user()->photo}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->first_name}} {{Auth::user()->surname}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       
         
        <li>
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>
       
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users') }}"><i class="fa fa-user"></i> Users Table</a></li>
            <li><a href="{{ route('event') }}"><i class="fa fa-calendar"></i> Events Table</a></li>
             <li><a href="{{ route('rsvp') }}"><i class="fa fa-check"></i> RSVP Table</a></li>
              <li><a href="{{route('card')}}"><i class="fa fa-credit-card"></i> Card Table</a></li>
          </ul>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

       
  @else
                <script> window.location= "/error";</script>
  @endif
@show
@yield('content')
<script>
  /** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.sidebar-menu a').filter(function() {
   return this.href == url;
}).parent().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
   return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>

</body>
</html>