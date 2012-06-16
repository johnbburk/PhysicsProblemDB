<!-- this is our blade template file
	other views will use this as a "wrapper" -->

<!DOCTYPE HTML>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	{{ HTML::style('css/style.css') }}
</head>
<body>
	<div class="header">
		@if ( Auth::guest() )
			{{ HTML::link('admin/account/login', 'Login') }}
		@else
			{{ HTML::link('admin/account/logout', 'Logout') }}
		@endif
		{{HTML::link('/', 'home')}}
		<hr />
		<h1>Problem Database</h1>
		<h2>Tailored problems for your students</h2>
	</div>

	<div class="content">
		@yield('content')
	</div>
</body>
</html>
