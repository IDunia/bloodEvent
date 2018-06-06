<!DOCTYPE html>
@if(isset(Auth::user()->email))
		@if(Auth::user()->role == 'Admin')
		<script type="text/javascript">window.location.href="{{url('/admin')}}";</script>
		@endif
		@if(Auth::user()->role=='User')
		<script type="text/javascript">window.location.href="{{url('/users')}}";</script>
		@endif
		@endif
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Login</title>
	 <link href="{!! asset('vendor/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet">
	  <script src="{!! asset('vendor/jquery/jquery.min.js')!!}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('vendor/bootstrap/js/bootstrap.min.js')!!}"></script>	
</head>
<body>
<div class="container box">
		<h1 align="center">Login</h1>
		<br>
		

		@if($message = Session::get('error'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">X</button>
			<strong>{{$message}}</strong>
		@endif
		@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
		@endif
		<form method="post" action="{{route('success.login')}}">
		{{csrf_field()}}
		<div class="form-group">
			<label>Enter email</label>
			<input type="email" name="email" class="form-control"/>
		</div>
		<div class="form-group">
			<label>Enter Passowrd</label>
			<input type="password" name="password" class="form-control"/>
		</div>
		<div class="form-group">
			<input type="submit" name="login" class="btn btn-primary" value="login"/>
		</div>
		</form>
	</div>	
</body>
</html>