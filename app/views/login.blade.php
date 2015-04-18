<!doctype html>

<html>

@include('includes.head')

<body>
	<article>
		@if (isset($message))
			<h2>{{ $message }}</h2>
			@if ($message == "AF")
			<h2>Authentication Failed. Please try again. 
				<br>If you don't have an account please <a href="{{ URL::to('/signup') }}">Sign Up</a>.</h2>
			@endif
		@else
		<h2>Login</h2>
		@endif

		{{ Form::open(array('url' => 'login', 'method' => 'post')) }}

			{{ Form::label('username','Username') }}
			{{ Form::text('username') }}

			{{ Form::label('password','Password') }}
			{{ Form::password('password') }}

			{{ Form::submit('Login') }}

		{{ Form::close() }}
		
	</article>
</body>

</html>
