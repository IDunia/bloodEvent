<!DOCTYPE html>
@if(isset(Auth::user()->email))
		@if(Auth::user()->role == 'Admin')
		<script type="text/javascript">window.location.href="{{url('/admin')}}";</script>
		@endif
		@if(Auth::user()->role=='User')
		<script type="text/javascript">window.location.href="{{url('/home')}}";</script>
		@endif
		@endif
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Blood Event/ Login</title>	
</head>
<body class="signup-page">
	@extends('layouts.navbar_user')


@section('content')
<div class="page-header header-filter"  style="background-image: url('./banner/login.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 ml-auto mr-auto">
          <div class="card card-signup"> 
            <img src="../banner/logo.png"  >
           <div class="card-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">mail</i>
                        </span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email...">
                </div>  
                                          
             </div>
             <div class="footer text-center">
                               <button class="btn btn-rose btn-round btn-lg">Get Started !</button>
                            </div>   
          </div>
        </div>
      </div>
    </div>
    @endsection	
  </div>
	
	</body>
	

</html>