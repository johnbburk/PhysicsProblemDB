@layout('templates.main')

@section('content')
	{{ Form::open('newuser') }}

		<!-- check for login errors flash var -->
		@if (Session::has('errors'))
			<div><span class="error">some kind of error happened</span></div>
		@endif

		<!-- username field -->
		@if ($errors->has('username'))
		<span class="error">{{$errors->first('username')}}</span>
			@endif
		<p>{{ Form::label('username', 'username') }}</p>
		<p>{{ Form::text('username', Input::old('username')) }}</p>
		
		<p>{{ Form::label('firstname', 'First name') }}</p>
		<p>{{ Form::text('firstname') }}</p>
		
		<p>{{ Form::label('lastname', 'Last name') }}</p>
		<p>{{ Form::text('lastname') }}</p>
		
		@if ($errors->has('email'))
		<span class="error">{{$errors->first('email')}}</span>
			@endif
		<p>{{ Form::label('email', 'email') }}</p>
		<p>{{ Form::text('email') }}</p>
		
		<p>{{ Form::label('institution', 'institution') }}</p>
		<p>{{ Form::text('institution') }}</p>
		
		<p>{{ Form::label('address', 'Address') }}</p>
		<p>{{ Form::text('address') }}</p>
		
		<p>{{ Form::label('address2', 'Address2') }}</p>
		<p>{{ Form::text('address2') }}</p>
		
		<p>{{ Form::label('city', 'city') }}</p>
		<p>{{ Form::text('city') }}</p>
		
		<p>{{ Form::label('state', 'State') }}</p>
		<p>{{ Form::text('state') }}</p>
		
		<p>{{ Form::label('zip', 'Zip code') }}</p>
		<p>{{ Form::text('zip') }}</p>
		
		<p>{{ Form::label('country', 'country') }}</p>
		<p>{{ Form::text('country') }}</p>

		<!-- password field -->
		@if ($errors->has('password'))
		<span class="error">{{$errors->first('password')}}</span>
			@endif
		<p>{{ Form::label('password', 'Password') }}</p>
		<p>{{ Form::text('password') }}</p>
		
		<p>{{ Form::label('password_confirmation', 'Password again') }}</p>
		<p>{{ Form::text('password_confirmation') }}</p>
	
		<!-- submit button -->
		<p>{{ Form::submit('Login') }}</p>

	{{ Form::close() }}
@endsection
