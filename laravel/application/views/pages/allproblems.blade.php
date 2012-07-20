@layout('templates.main')

@section('content')

	@foreach ($probs AS $prob)
		@include('templates.problem')
					
		<hr/>
	@endforeach


@endsection
