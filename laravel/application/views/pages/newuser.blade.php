@layout('templates.main')

@section('content')
{{ Form::open('admin/account/newuser', "POST", array("class" => "form-horizontal")) }}

<fieldset>
	<legend>Required Information</legend>
	<!-- check for login errors flash var -->
	@if (Session::has('errors'))
	<div><span class="error">some kind of error happened</span></div>
	@endif

	<div class="control-group">
		<!-- username field -->
		@if ($errors->has('username'))
		<span class="error">{{$errors->first('username')}}</span>
		@endif
		{{ Form::label('username', 'Username', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('username', Input::old('username'), array("class" => "input-xlarge")) }}
		</div>
	</div>
	
	<div class="control-group">
		@if ($errors->has('email'))
		<span class="error">{{$errors->first('email')}}</span>
			@endif
		{{ Form::label('email', 'Email', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('email', Input::old('email'), array("class" => "input-xlarge")) }}
		</div>
	</div>


		<!-- password field -->
		@if ($errors->has('password'))
		<span class="error">{{$errors->first('password')}}</span>
		@endif

		<div class="control-group">
			{{ Form::label('password', 'Password', array("class" => "control-label")) }}
			<div class="controls">
				{{ Form::password('password', array("class" => "input-xlarge")) }}
			</div>
		</div>

		<div class="control-group">
			{{ Form::label('password_confirmation', 'Confirm Password', array("class" => "control-label")) }}
			<div class="controls">
				{{ Form::password('password_confirmation',  array("class" => "input-xlarge")) }}
			</div>
		</div>


		<legend>Additional information</legend>
			
	<div class="control-group">
		{{ Form::label('firstname', 'First Name', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('firstname', Input::old('firstname'), array("class" => "input-xlarge")) }}
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('lastname', 'Last Name', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('lastname', Input::old('lastname'), array("class" => "input-xlarge")) }}
		</div>
	</div>
	
	<div class="control-group">
		{{ Form::label('institution', 'Institution', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('institution', Input::old('institution'), array("class" => "input-xlarge")) }}
		</div>
	</div>
		
	<div class="control-group">
		{{ Form::label('address', 'Address', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('address', Input::old('address'), array("class" => "input-xlarge")) }}
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('address2', 'Address 2', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('address2', Input::old('address2'), array("class" => "input-xlarge")) }}
		</div>
	</div>
		
	<div class="control-group">
		{{ Form::label('city', 'City', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('city', Input::old('city'), array("class" => "input-xlarge")) }}
		</div>
	</div>
		
	<div class="control-group">
		{{ Form::label('state', 'State', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('state', Input::old('state'), array("class" => "input-xlarge")) }}
		</div>
	</div>
		
	<div class="control-group">
		{{ Form::label('country', 'Country', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('country', Input::old('country'), array("class" => "input-xlarge")) }}
		</div>
	</div>
		
	<div class="control-group">
		{{ Form::label('zip', 'Zip Code', array("class" => "control-label")) }}
		<div class="controls">
			{{ Form::text('zip', Input::old('zip'), array("class" => "input-xlarge")) }}
		</div>
	</div>
		



		
	
		<!-- submit button -->
		<div class="form-actions">
			{{ Form::submit('Submit', array("class" => "btn btn-primary")) }}
		</div>

	{{ Form::close() }}
@endsection
