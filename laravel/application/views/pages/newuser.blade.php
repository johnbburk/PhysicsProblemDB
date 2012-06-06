@layout('templates.main')

@section('content')
	{{ Form::open('newuser') }}

		<!-- check for login errors flash var -->
		@if (Session::has('newuser_errors'))
			<span class="error">some kind of error happened</span>
		@endif

		<!-- username field -->
		<p>{{ Form::label('name', 'name') }}</p>
		<p>{{ Form::text('name') }}</p>

		<!-- password field -->
		<p>{{ Form::label('password', 'Password') }}</p>
		<p>{{ Form::text('password') }}</p>
		
		<p>{{ Form::label('school', 'school') }}</p>
		<p>{{ Form::text('school') }}</p>

		<!-- submit button -->
		<p>{{ Form::submit('Login') }}</p>

	{{ Form::close() }}
@endsection
