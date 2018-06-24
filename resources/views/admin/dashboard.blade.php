<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
  <link rel="shortcut icon" href="{{{ asset('banner/icon.png') }}}">   	
</head>
<body>
@extends('layouts.navbar_admin')


@section('content')
<div class="content-wrapper">
     <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <section class="content">
        <div class="row">
             <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>{{$count = DB::table('users')->count()}}</h3>

                      <p>Users</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <a href="{{route('users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
            </div>

            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>{{$count = DB::table('events')->count()}}</h3>

                      <p>Events</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <a href="{{route('event')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
            </div>

            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3>{{$count = DB::table('rsvps')->count()}}</h3>

                      <p>RSVP Info</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-calendar-check-o"></i>
                    </div>
                    <a href="{{route('rsvp')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
            </div>

        </div>
    </section>
</div>
        <!-- /#page-wrapper -->
@endsection
	

</body>
</html>