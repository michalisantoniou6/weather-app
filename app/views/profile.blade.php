<!doctype html>

<html>

@include('includes.head')
@include('includes.members-menu')

<body>

	<h2>Hi {{{ $username }}}</h2>
	{{ link_to_route('profile.editLocations', 'Choose locations to receive updates', [$username]) }}

	<article>
	@if (isset($temps) && count($temps[0]) > 0)
		<h2>Weather updates for your chosen locations: </h2>
		@for ($i=0; $i < count($temps[0]); $i++)
			<p>The temperature in {{ $temps[0][$i] }}
			today is {{ $temps[1][$i] }} Celsius.<br></p>
		@endfor		
	@endif
	</article>
</body>

</html>
