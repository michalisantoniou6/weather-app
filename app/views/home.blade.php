<!doctype html>
<html lang="en">

@include('includes.head')

<body>
	<div class="welcome">
		<h1>WeatherApp</h1>
		<a href="{{ URL::to('signup') }}">Signup</a>
		<p>or</p>
		<a href="{{ URL::to('login') }}">Login</a>
		
	</div>
</body>
</html>
