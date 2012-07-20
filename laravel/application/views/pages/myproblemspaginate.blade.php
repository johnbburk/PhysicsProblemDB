@layout('templates.main')

@section('content')
	
	@foreach ($probs->results AS $prob)
		@include('templates.problem')
		<hr/>
	@endforeach
	<p>{{$probs->links()}}</p>

@endsection
