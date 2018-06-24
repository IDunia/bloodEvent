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
<link rel="shortcut icon" href="{{{ asset('banner/icon.png') }}}">
	<title>Blood Event/ Reset Password</title>	
</head>
<body class="signup-page">
	@extends('layouts.navbar_user')


@section('content')
<div class="page-header header-filter"  style="background-image: url('./banner/reset.jpg')">
    <div class="container">
     	<div class="row">
        	<div class="col-md-4 col-sm-6 ml-auto mr-auto">
			<form method="post" id="resetForm" action="{{route('resetpassword')}}">
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
						@elseif($message = Session::get('success'))
							<div class="alert alert-success">
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
		                
                                   
             		</div>
             
		             <div class="footer text-center">
		             	<br>
                         <input type="hidden" name="button_action_reset" id="button_action_reset" value="update"/>
		                 <input type="submit" class="btn btn-rose btn-round btn-lg" name="login" value="Reset Password " />
		                
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