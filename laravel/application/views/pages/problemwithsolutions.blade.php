@layout('templates.main')

@section('content')

<div>

	@include('templates.problem')
	

</div>

@foreach ($prob->solutions AS $sol)
	@include('templates.solution')
	<hr/>
@endforeach

@endsection
