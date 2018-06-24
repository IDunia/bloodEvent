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
	<title>Blood Event/ Register</title>	
	<script type="text/javascript" src="{!! asset('vendor/jquery/dist/jquery.min.js')!!}""></script>
</head>
<body class="signup-page">
	@extends('layouts.navbar_user')


@section('content')
<div class="page-header header-filter"  style="background-image: url('./banner/register.jpg')">
    <div class="container">
     	<div class="row">
        	<div class="col-md-4 col-sm-6 ml-auto mr-auto">
			<form method="post" id="loginForm" action="{{route('register')}}">
					{{csrf_field()}}
          		<div class="card card-signup"> 
            		<img src="../banner/logo.png"  >
          			 <div class="card-body">
          			 	<span id="form_output"> 
							@if($message = Session::get('error'))
							<div class="alert alert-success">

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
		                <div class="input-group">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">
		                            <i class="material-icons">contacts</i>
		                        </span>
		                    </div>
		                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name..." required="required" >
							
		                </div>
		                <div class="input-group">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">
		                            <i class="material-icons">contacts</i>
		                        </span>
		                    </div>
		                    <input type="hidden" name="role" id="role" value="User">
							<input type="text" id="surname" name="surname" class="form-control" placeholder="Surname..." required="required" >
		                </div>

                                   
             		</div>
             
		             <div class="footer text-center">
		             	<br>
		                 <input type="submit" class="btn btn-rose btn-round btn-lg" name="login" value="Create new Account !" id="login" />
		                 <p>Already Have Account ? <a href="/login" class="text-rose" >Login  Here !</a></p> 
		                 <p > </p>
		             </div> 
		        </div> 
            </form>

          	</div>

        	</div>
      	</div>  
    
      	    @endsection	
    </div>

  	<script type="text/javascript" >   
 	  $(document).ready(function(){
 	 
 	 $('#email').blur(function(){
        var error_email = '';
        var email = $('#email').val();
        var _token = $('input[name="_token"]').val();
       
        if($.trim(email).length > 0)
        {
            
                $.ajax({
                    url:"{{ route('checkEmail') }}",
                    method:"POST",
                    data:{email:email, _token:_token},
                    success:function(result)
                    {
                        if(result == 'available')
                        {
                           
                            $('#form_output').html('<div class="alert alert-success">Email available </div>');
                           
                            $('#login').attr('disabled', false);
                            
                        }
                        else
                        {
                            $('#form_output').html('<div class="alert alert-danger">Email Already Exist </div>');
                            
                            $('#login').attr('disabled', 'disabled');
                  
                        }
                    }
                })
            }
        
      
    });

      
 	 });
 	</script>
	
	</body>
	
</html>