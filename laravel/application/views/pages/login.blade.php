@layout('templates.main')

@section('sidebar')
<li>{{HTML::link_to_action('admin.account@newuser', 'Sign up for an account')}}</li>
@endsection


@section('content')
{{ Form::open('admin/account/login', "POST", array("class" => "form-horizontal")) }}

<fieldset>
	<legend>Please Login!</legend>
	<!-- check for login errors flash var -->
	@if (Session::has('login_errors'))
	<span class="error">Username or password incorrect.</span>
	@endif

	<!-- username field -->
	<div class="control-group">
		{{Form::label('username', "Username", array("class" => "control-label"))}}
		<div class="controls">
			{{Form::text('username', null, array("class" => "input-xlarge"))}}
		</div>
	</div>

	<!-- password field -->
	<div class="control-group">
		{{Form::label('password', "Password", array("class" => "control-label"))}}
		<div class="controls">
			{{Form::password('password',  array("class" => "input-xlarge"))}}
		</div>
	</div>

	<!-- submit button -->
	<div class="form-actions">
		<p>{{ Form::submit('Login', array("class" => "btn btn-primary")) }}</p>
	</div>

</fieldset>
{{ Form::close() }}
	@endsection
