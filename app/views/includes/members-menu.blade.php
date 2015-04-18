<header id="header">
	<a href="{{ URL::to('signup') }}">SignUp</a>
	{{ link_to_route('profile.show', 'Profile', [$username]) }}
	<a href="{{ URL::to('logout') }}">Logout</a>
</header>