<html>
<head></head>
<body>
<img src="{{ $message->embed(asset('banner/logo.png')) }}">
<h3>Hi, {{ $first_name }} {{$surname}}</h3>
<p>Your new password is <b>{{$password}}</b> </p>
<p>Please login and use that password ! </p>
</body>
</html>