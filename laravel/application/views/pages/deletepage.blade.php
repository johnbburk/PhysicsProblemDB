@layout('templates.main')

@section('content')

<div>

	@include('templates.problem')
	

</div>

<div>
<p>Are you really sure you want to do this?</p>
{{ Form::open("problems/delete/$prob->id", "POST", array("class" => "form-horizontal")) }}
{{ Form::submit('Yes I am sure', array("class" => "btn btn-primary")) }}
{{ Form::close() }}
@endsection
