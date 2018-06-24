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
	<link rel="shortcut icon" href="{{{ asset('banner/icon.png') }}}">
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
			<form method="post" id="loginForm" action="{{route('success.login')}}">
					{{csrf_field()}}
          		<div class="card card-signup"> 
            		<img src="../banner/logo.png"  >
          			 <div class="card-body">
          			 	<span id="form_output">
						@if($message = Session::get('error'))
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">X</button>
								{{$message}}
							</div>
							@endif      			 	
					</span>
		                <div class="input-group">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">
		                            <i class="material-icons">mail</i>
		                        </span>
		                    </div>
		                    <input type="email" id="email" name="email" class="form-control" placeholder="Email..." required="required">
		                </div>  
		                 <div class="input-group">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">
		                            <i class="material-icons">vpn_key</i>
		                        </span>
		                    </div>
		                    <input type="password" id="password" name="password" class="form-control" placeholder="Password..." required="required" minlength="8">
		                </div>
                                   
             		</div>
             
		             <div class="footer text-center">
		             	
		                 <p><input type="submit" class="btn btn-rose btn-round btn-lg" name="login" value="Login !" /></p>
		                 <p>Not Registered yet ? <a href="/register" class="text-rose" >Register Here !</a></p> 
		                 <p>Forget Password ? <a href="/reset" class="text-primary"> Reset Here !</a></p>
		             </div> 
		        </div> 
            </form>

          	</div>

        	</div>
      	</div>  
      	<script type="text/javascript" src="{!! asset('vendor/jquery/dist/jquery.min.js')!!}">   
 	 $(document).ready(function(){
 	 
 	 
      
 	 });
 	</script>
      	    @endsection	
    </div>


	
	</body>
	
</html>