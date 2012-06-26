<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		{{ HTML::style('css/bootstrap.css') }}
		{{ HTML::style('css/style.css') }}
		<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					{{HTML::link('/', 'Problem Database', array('class' => 'brand'))}}
					<ul class="nav">
						<li <?php if (isset($navbar) && $navbar == 'home') echo "class='active'" ?> >{{HTML::link('/', 'Home')}}</li>
						<li <?php if (isset($navbar) && $navbar == 'problems') echo "class='active'" ?> >{{ HTML::link('/problems', 'Problems') }}</li>
						<li <?php if (isset($navbar) && $navbar == 'about') echo "class='active'" ?> ><a href="#about">About</a></li>
					</ul>

					<div class="btn-group pull-right">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-user"></i> Account
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>@if ( Auth::guest() )
							{{ HTML::link('admin/account/login', 'Login') }}
							@else
							<li>{{ HTML::link('admin/account', 'Profile') }}</li>
							<li class="divider"></li>
							<li>{{ HTML::link('admin/account/logout', 'Logout') }}</li>
							@endif</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="content">
				<div class="row-fluid">
					<div class="span3">
						<div class="well sidebar">
							<ul class="nav nav-list">
								@section('sidebar')

								@if (Auth::guest())
								<li>{{HTML::link_to_action('admin.account@login', 'Login')}}</li>
								<li>{{HTML::link_to_action('admin.account@newuser', 'Sign up for an account')}}</li>
								@else
								<li  ><a href="{{URL::to_action('home')}}"><i class="icon-home"></i> Home</a></li>
								<li><a href="{{URL::to_action('problems@new')}}"><i class="icon-plus"></i> Add a problem</a></li>
								<li><a href="{{URL::to_action('problems@mine')}}"><i class="icon-list"></i> View my problems</a></li>
								@endif
								@yield_section
							</ul>
						</div>
					</div>
					<div class="span9">

						@yield('content')

					</div><!--/span-->
				</div><!--/row-->
			</div><!-- /content -->

			<hr>

			<footer>
			<p>&copy; Company 2012</p>
			</footer>

		</div><!--/container-->

		{{ HTML::script('js/jquery.js');  }}
		{{ HTML::script('js/bootstrap-dropdown.js');  }}

	</body>
</html>
