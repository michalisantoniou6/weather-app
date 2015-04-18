<!doctype html>

<html>
@include('includes.head')

<body>
	<article>
	@if (isset($errors))
		<h2>Errors occured during validation:</h2>
		@foreach ($errors->all() as $error)
			<p class="error">{{ $error }}</p>
		@endforeach
	@endif
		<h2>New User Registration</h2>
		{{ Form::open(['action' => 'SignUpController@register', 'method' => 'post']) }}

			{{ Form::label('username','Username') }}
			{{ Form::text('username') }}

			{{ Form::label('email','Email Address') }}
			{{ Form::email('email') }}

			{{ Form::label('password','Password') }}
			{{ Form::password('password') }}

			{{ Form::submit('Create Account') }}

		{{ Form::close() }}
	</article>
</body>

</html>
